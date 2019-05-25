from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome()
driver.get("http://localhost/to-do-sqa/index.php")

#
usr = driver.find_element_by_name("username")
pwd = driver.find_element_by_name("password")
login = driver.find_element_by_name("login")

#login
usr.clear()
usr.send_keys("arviboy")
pwd.clear()
pwd.send_keys("hello")
login.click()
time.sleep(2)
driver.save_screenshot('login-success.png')

#Select ‘View History’ to view list of done tasks.
driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
history = driver.find_element_by_id('history')
history.click()
time.sleep(2)
driver.save_screenshot('read-history-page.png')

# Click ‘CLEAR HISTORY’
clearhistory = driver.find_element_by_id('clear-history')
clearhistory.click()
time.sleep(2)
driver.save_screenshot('clear-history.png')
driver.close()

assert "No results found." not in driver.page_source
