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

#
taskinp = driver.find_element_by_id("task")
date = driver.find_element_by_id("date")
add = driver.find_element_by_id("insert")

# Input task as blank.
taskinp.clear()
add.click()
time.sleep(2)
driver.save_screenshot('blank-task-fail.png')

# Input task and deadline.
taskinp.clear()
taskinp.send_keys("Camiguin Trip")
date.clear()
date.send_keys("12122019")
time.sleep(2)
driver.save_screenshot('create-task.png')

add.click()
driver.save_screenshot('task-added.png')
time.sleep(3)

#Update task and deadline.
edittsk = driver.find_element_by_name("edit")
edittsk.click()
time.sleep(3)
driver.save_screenshot('edit-task-modal.png')

edittskname = driver.find_element_by_id("edit-task")
edittskdate = driver.find_element_by_id("edit-date")

edittskname.clear()
edittskname.send_keys("Camiguin Trip with Family")
edittskdate.clear()
edittskdate.send_keys("11102019")
time.sleep(2)
driver.save_screenshot('udpate-task.png')

updatetsk = driver.find_element_by_id("update")
updatetsk.click()
time.sleep(2)
driver.save_screenshot('task-updated.png')


#reset
taskinp = driver.find_element_by_id("task")
date = driver.find_element_by_id("date")
add = driver.find_element_by_id("insert")

# Input deadline on or before the current date.
taskinp.clear()
taskinp.send_keys("SQA Finals")
date.clear()
date.send_keys("24052019")
time.sleep(2)
driver.save_screenshot('create-task-deadline.png')

add.click()
driver.save_screenshot('task-added-red.png')
time.sleep(3)

driver.close()
assert "No results found." not in driver.page_source