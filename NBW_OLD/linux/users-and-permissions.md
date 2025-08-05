
<!-- MarkdownTOC -->

- [How can I relax Linux password requirements?](#how-can-i-relax-linux-password-requirements)

<!-- /MarkdownTOC -->


<a id="how-can-i-relax-linux-password-requirements"></a>
## How can I relax Linux password requirements?

First of all, unless you are trying to make life easy for the black hats, it's a **terrible idea**
to relax any security features in any production system. For my use case, I am playing around to
learning about system security and I do not want to deal with long or complex password.

With that out of the way, you can relax the Linux password by:

```bash +torchlight-bash
# open /etc/pam.d/common-password file
sudo nano /etc/pam.d/common-password
# find
password [success=1 default=ignore] pam_unix.so obscure sha512
# add minlen=1 minclass=1
password [success=1 default=ignore] pam_unix.so minlen=1 minclass=1
```

`minlen=1` an option for the pam_unix module that specifies the minimum length of a password. In this case, it sets the minimum length to 1 character.

`minclass=1` is another option for the pam_unix module that specifies the minimum number of character classes required in a password. A character class is a set of characters that share a common trait, such as uppercase letters, lowercase letters, digits, or special characters.
