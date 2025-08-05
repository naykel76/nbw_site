# Ubuntu Node Setup
<!-- TOC -->

- [Update server and install npm](#update-server-and-install-npm)
- [Node Version Manager](#node-version-manager)
    - [Switching Node Versions](#switching-node-versions)

<!-- /TOC -->

<a id="markdown-update-server-and-install-npm" name="update-server-and-install-npm"></a>

## Update server and install npm

```bash +torchlight-bash
sudo apt update && apt upgrade -y
sudo apt install npm
```

Installing NPM will also install node but it will not be the latest version! To resolve this issue install node version manager, then install latest stable node version, and switch to it.

<div class="bx warning flex va-c">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#information-circle"></use></svg>
    <div>Installing NPM will also install node but it will not be the latest version! To resolve this issue install node version manager, then install latest stable node version, and switch to it.</div>
</div>

<a id="markdown-node-version-manager" name="node-version-manager"></a>

## Node Version Manager

Install node version manager, then install latest stable node version, and switch to it.

```bash +torchlight-bash
# install node version manager
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.5/install.sh | bash
```


<div class="bx warning flex va-c">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#exclamation-circle"></use></svg>
    <div>Once the installation is complete, you may need to close and reopen your terminal or run <code>source ~/.bashrc</code> to make NVM available in your current terminal session.</div>
</div>

<a id="markdown-switching-node-versions" name="switching-node-versions"></a>

### Switching Node Versions

```bash +torchlight-bash
# install version
nvm install v18.17.1
# switch to latest version
nvm use v18.17.1
```

<!-- $ nvm use 16
Now using node v16.9.1 (npm v7.21.1)
$ node -v
v16.9.1
$ nvm use 14
Now using node v14.18.0 (npm v6.14.15)
$ node -v
v14.18.0
$ nvm install 12
Now using node v12.22.6 (npm v6.14.5)
$ node -v
v12.22.6 -->


When the node RELP is open, press `Ctrl + C` to exit.

**Note:** the version will not change until you log out of the console and log back in.



