
# Use Set-UID to lift a privilege for a 'normal' program

## Copy the 'id' program and display the default permissions

```bash
cd ~
# copy 'id' program
cp /usr/bin/id ./myfile1
# run copied program
./myfile1
```

Expected Output:

```bash
uid=1000(seed) gid=1000(seed) groups=1000(seed),120(docker)
# permissions
-rwxr-xr-x 1 seed seed 47480 Mar 22 20:06 myfile1
```

<question></question>
Q. What is the `euid` in the output?
<answer></answer>
When a normal program is executed `euid` = `ruid`, and they both equal the `uid` of the
user who runs the program. Therefore, `euid=uid && ruid=uid` so the answer is 1000.

## Copy the 'id' program and set-uid bit to elevate program privilege

By elevating the program privileged the user can access files they would otherwise not be able to access, this is because ...

```bash
cd ~
# copy 'id' program
cp /usr/bin/id ./myfile
# change program owner to root
sudo chown root myfile
# change permissions to include set-uid bit and elevate permissions
sudo chmod 4755 myfile
# run elevated program
./myfile
```

Expected output:

```bash
uid=1000(seed) gid=1000(seed) euid=0(root) groups=1000(seed),120(docker)
#permissions
-rwsr-xr-x 1 root seed 47480 Mar 22 20:06 myfile
```

<question></question>
Q. What is the `euid` in the output?

<answer></answer>
When the `set-uid` bit is set the `ruid` is still equal to the `uid`, however the `euid` is set to
the program owner which in this case is `root` with a id of 0. Therefore, `ruid=uid && euid!=uid`

-rwxr-xr-x
-rwxr-xr-x
