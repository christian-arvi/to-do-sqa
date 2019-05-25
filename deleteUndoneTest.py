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

#Choose a task and select ‘Done’.
deletetask = driver.find_element_by_id('done')
deletetask.click()
time.sleep(2)
driver.save_screenshot('task-deleted.png')

#Select ‘View History’ to view list of done tasks.
driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
history = driver.find_element_by_id('history')
history.click()
time.sleep(2)
driver.save_screenshot('history-page.png')

# Click a task to undone
undotask = driver.find_element_by_id('undone')
undotask.click()
driver.save_screenshot('task-undone-result.png')
time.sleep(2)

# Return to task page to view the undone task.
home = driver.find_element_by_name('home')
home.click()
time.sleep(2)
driver.save_screenshot('undone-task-home.png')
driver.close()