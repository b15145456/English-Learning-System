from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import requests
import time

driver = webdriver.Chrome()
driver.get("http://www.dictionary.com/browse/d?s=t")
elem = driver.find_element_by_name("q")

import json
with open('C:\\Users\\user\\Desktop\\voc.json', 'r') as f:
    voc = json.load(f)
i = 0
for i in range(len(voc)):
    print(voc[i][0])
    elem = driver.find_element_by_name("q")
    try:
        elem.send_keys(voc[i][0])
        elem.send_keys(Keys.RETURN)
        elem2 = driver.find_element_by_xpath("""//*[@id="source-luna"]/div[1]/section/header/div[1]/div/audio/source[2]""")
        
    except:
        print ("No Found："+ voc[i][0])
        continue
    elem2_attribute_value = elem2.get_attribute('src')
    print (elem2_attribute_value)
    url = elem2_attribute_value

    print ("downloading "+voc[i][0]+" with requests")
    start = time.time()
    r = requests.get(url)
    with open('download'+'\\'+voc[i][0]+'.mp3', 'wb') as audio:
        audio.write(r.content)
    end = time.time()
    print ('Finish in ：', end - start)
    i+=1



