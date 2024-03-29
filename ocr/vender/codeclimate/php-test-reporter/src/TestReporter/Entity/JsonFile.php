<?php
namespace CodeClimate\PhpTestReporter\TestReporter\Entity;

use CodeClimate\PhpTestReporter\Constants\Version;
use CodeClimate\PhpTestReporter\System\Git\GitCommand;
use Satooshi\Bundle\CoverallsV1Bundle;

class JsonFile
{
    /**
     * @var CoverallsV1Bundle\Entity\JsonFile
     */
    private $jsonFile;

    public function __construct(CoverallsV1Bundle\Entity\JsonFile $jsonFile)
    {
        $this->jsonFile = $jsonFile;
    }

    public function toArray()
    {
        return array(
            "partial"      => false,
            "run_at"       => $this->getRunAt(),
            "repo_token"   => $this->getRepoToken(),
            "environment"  => $this->getEnvironment(),
            "git"          => $this->collectGitInfo(),
            "ci_service"   => $this->collectCiServiceInfo(),
            "source_files" => $this->collectSourceFiles(),
        );
    }

    public function getRunAt()
    {
        return strtotime($this->jsonFile->getRunAt());
    }

    public function getRepoToken()
    {
        return $_SERVER["CODECLIMATE_REPO_TOKEN"];
    }

    /**
     * @return array
     */
    protected function getEnvironment()
    {
        return array(
            "pwd"             => getcwd(),
            "package_version" => Version::VERSION,
        );
    }

    /**
     * @return array
     */
    protected function collectGitInfo()
    {
        $command = new GitCommand();

        return $command->getGitInfo()->toArray();
    }

    /**
     * @return array
     */
    protected function collectCiServiceInfo()
    {
        $ciInfo = new CiInfo($_SERVER);

        return $ciInfo->toArray();
    }

    /**
     * @return array
     */
    protected function collectSourceFiles()
    {
        $data = array();

        foreach ($this->jsonFile->getSourceFiles() as $sourceFile) {
            $data[] = array(
                "name"     => $sourceFile->getName(),
                "coverage" => json_encode($sourceFile->getCoverage()),
                "blob_id"  => $this->calculateBlobId($sourceFile),
            );
        }

        return $data;
    }

    /**
     * @param CoverallsV1Bundle\Entity\SourceFile $sourceFile
     * @return string
     */
    protected function calculateBlobId(CoverallsV1Bundle\Entity\SourceFile $sourceFile)
    {
        $content = file_get_contents($sourceFile->getPath());
        $header  = "blob " . strlen($content) . "\0";

        return sha1($header . $content);
    }

    public function __toString()
    {
        return json_encode($this->toArray());
    }
}
