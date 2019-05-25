from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome()
driver.get("http://localhost/to-do-sqa/index.php")
time.sleep(2)
driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
driver.save_screenshot('index.png')


sgnup = driver.find_element_by_tag_name('a')

#signup click
sgnup.click()
driver.save_screenshot('signup-page.png')

#
usr = driver.find_element_by_name("username")
pwd = driver.find_element_by_name("password")
confpwd = driver.find_element_by_name("confpassword")
bday = driver.find_element_by_name("birthdate")
mail = driver.find_element_by_name("email")
signup = driver.find_element_by_name("save")

#Input fields as blank.
signup.click()
time.sleep(1)
driver.save_screenshot('signup-fail-blank.png')

#Input username more than 25 characters.
usr.clear()
usr.send_keys("Thequickbrownfoxjumpsoverthelazydog")
driver.save_screenshot('input-maxlen-test.png')

#Input existing username.
usr.clear()
usr.send_keys("arviboy")
bday.clear()
bday.send_keys("03231999")
mail.clear()
mail.send_keys("sampleemail@gmail.com")
pwd.clear()
pwd.send_keys("kikoman")
confpwd.clear()
confpwd.send_keys("kikoman")
driver.save_screenshot('input-existing-username.png')

signup.click()
time.sleep(2)
driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
driver.save_screenshot('username-taken.png')
time.sleep(3)

#reset
usr = driver.find_element_by_name("username")
pwd = driver.find_element_by_name("password")
confpwd = driver.find_element_by_name("confpassword")
bday = driver.find_element_by_name("birthdate")
mail = driver.find_element_by_name("email")
signup = driver.find_element_by_name("save")

#Input different passwords.
usr.clear()
usr.send_keys("ericab")
bday.clear()
bday.send_keys("03231999")
mail.clear()
mail.send_keys("sampleemail@gmail.com")
pwd.clear()
pwd.send_keys("kikoman1")
confpwd.clear()
confpwd.send_keys("kikoman")
driver.save_screenshot('input-incorrect-passwords.png')

signup.click()
time.sleep(2)
driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
driver.save_screenshot('password-fail.png')
time.sleep(3)

#reset
usr = driver.find_element_by_name("username")
pwd = driver.find_element_by_name("password")
confpwd = driver.find_element_by_name("confpassword")
bday = driver.find_element_by_name("birthdate")
mail = driver.find_element_by_name("email")
signup = driver.find_element_by_name("save")

#Input new username and same passwords.
usr.clear()
usr.send_keys("ericab")
bday.clear()
bday.send_keys("03231999")
mail.clear()
mail.send_keys("sampleemail@gmail.com")
pwd.clear()
pwd.send_keys("kikoman")
confpwd.clear()
confpwd.send_keys("kikoman")
driver.save_screenshot('input-correct-credentials.png')

signup.click()
time.sleep(2)
driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
driver.save_screenshot('signup-complete.png')
driver.close()