# What is this?
This is a simple PHP script used to check if your password has been pwned or not.

In simple terms, check if your password has been leaked before or not in password leaks which in turn checks if your password is secure enough or not.

# How to use?
It's simple, all you need is php running on your machine.
`php pwned.php [password]`
Then the results will tell you if your password has been leaked before or not.

# How does it work?
This script contacts a public API which is `https://api.pwnedpasswords.com`. It sends in a subset of the SHA1 hash of the password you entered and then the API will reply with all hashes that it has in its records that matches that certain subset of the hash we sent in.

# Is it safe to send my password in the public like that?
Yes. Technically, you're not sending the password itself. We're just sending the first 5 characters of the SHA1 hash of the password that we're checking.

# Credits
For more information, you can check this YouTube video:
[https://www.youtube.com/watch?v=hhUb5iknVJs](Here)
