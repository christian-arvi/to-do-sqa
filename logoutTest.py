from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome()
driver.get("http://localhost/to-do-sqa/index.php")

#
usr = driver.find_element_by_name("username")
pwd = driver.find_element_by_name("password")
login = driver.find_element_by_name("login")

usr.clear()
usr.send_keys("arviboy")
pwd.clear()
pwd.send_keys("hello")
login.click()
time.sleep(2)
driver.save_screenshot('login-success.png')

driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
time.sleep(2)
driver.save_screenshot('logout-button.png')
logout = driver.find_element_by_id('logout')
logout.click()
driver.save_screenshot('logout-success.png')

driver.close()