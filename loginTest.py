from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome()
driver.get("http://localhost/to-do-sqa/index.php")
time.sleep(2)
driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
driver.save_screenshot('index.png')

#
usr = driver.find_element_by_name("username")
pwd = driver.find_element_by_name("password")
login = driver.find_element_by_name("login")

# Input fields as blank.
login.click()
time.sleep(1)
driver.save_screenshot('login-fail-blank.png')

# Input username more than 25 characters.
usr.clear()
usr.send_keys("Thequickbrownfoxjumpsoverthelazydog")
driver.save_screenshot('username-maxlen-test.png')

# Input non-existing account.
usr.clear()
usr.send_keys("arviboy")
pwd.clear()
pwd.send_keys("arviboy")
driver.save_screenshot('incorrect-credentials.png')
login.click()
time.sleep(2)
driver.save_screenshot('login-fail.png')
time.sleep(3)

#reset
usr = driver.find_element_by_name("username")
pwd = driver.find_element_by_name("password")
login = driver.find_element_by_name("login")

# Input existing account.
usr.clear()
usr.send_keys("arviboy")
pwd.clear()
pwd.send_keys("hello")
driver.save_screenshot('correct-credentials.png')
login.click()
time.sleep(2)
driver.save_screenshot('login-success.png')

driver.close()