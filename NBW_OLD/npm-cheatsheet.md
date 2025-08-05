# NPM Cheatsheet

<!-- TOC -->

- [Common Commands](#common-commands)
- [Version Control and Publishing](#version-control-and-publishing)
- [Update all packages including package.json](#update-all-packages-including-packagejson)

<!-- /TOC -->
https://docs.npmjs.com/cli/v9/commands


## Common Commands
<code-first-col></code-first-col>
| Syntax                    | Action                                               |
| :------------------------ | :--------------------------------------------------- |
| npm audit                 | Scan and list all the vulnerabilities in the project |
| npm audit fix             | Fix found vulnerabilities                            |
| npm i <package>           | Install a package                                    |
| npm install npm@latest -g | Update npm                                           |
| npm ls                    | List packages                                        |
| npm outdated [PACKAGE]    | Check for outdated packages                          |
| npm update <package>      | Update a package                                     |
| npm rm                    | Remove a package                                     |


## Version Control and Publishing
<code-first-col></code-first-col>
| Syntax                     | Action                                           |
| :------------------------- | :----------------------------------------------- |
| npm publish                | Publish a package                                |
| npm uninstall              | Remove a package                                 |
| npm unpublish              | Remove a package from the registry               |
| npm version                | See version details                              |
| npm version [type]         | Bump version \| `major` \| `minor` \| `patch` \| |
| npm show [package] version | See package version details                      |
|                            |


## Update all packages including package.json

```bash +torchlight-bash
npm outdated # check for outdated packages
npm update # update all packages
npm install -g npm-check-updates # install npm-check-updates globally
ncu -u # update package.json
npm install # install new packages
```




---
---
---
npm version [<newversion> |  premajor \| preminor \| prepatch \| prerelease \| from-git]


| npm access                | Set access level on published packages               |
| npm adduser               | Add a registry user account                          |
| npm audit                 | Run a security audit                                 |
| npm bugs                  | Bugs for a package in a web browser maybe            |
| npm cache                 | Manipulates packages cache                           |
| npm ci                    | Install a project with a clean slate                 |
| npm completion            | Tab completion for npm                               |
| npm config                | Manage the npm configuration files                   |
| npm dedupe                | Reduce duplication                                   |
| npm deprecate             | Deprecate a version of a package                     |
| npm diff                  | The registry diff command                            |
| npm dist-tag              | Modify package distribution tags                     |
| npm docs                  | Docs for a package in a web browser maybe            |
| npm doctor                | Check your environments                              |
| npm edit                  | Edit an installed package                            |
| npm exec                  | Run a command from an npm package                    |
| npm explain               | Explain installed packages                           |
| npm explore               | Browse an installed package                          |
| npm find-dupes            | Find duplication in the package tree                 |
| npm fund                  | Retrieve funding information                         |
| npm help                  | Search npm help documentation                        |
| npm help-search           | Get help on npm                                      |
| npm hook                  | Manage registry hooks                                |
| npm init                  | Create a package.json file                           |
| npm install               | Install a package                                    |
| npm install-ci-test       | Install a project with a clean slate and run tests   |
| npm install-test          | Install package(s) and run tests                     |
| npm link                  | Symlink a package folder                             |
| npm login                 | Login to a registry user account                     |
| npm logout                | Log out of the registry                              |
| npm ls                    | List installed packages                              |
| npm org                   | Manage orgs                                          |
| npm outdated              | Check for outdated packages                          |
| npm owner                 | Manage package owners                                |
| npm pack                  | Create a tarball from a package                      |
| npm ping                  | Ping npm registry                                    |
| npm pkg                   | Manages your package.json                            |
| npm prefix                | Display prefix                                       |
| npm profile               | Change settings on your registry profile             |
| npm prune                 | Remove extraneous packages                           |
| npm query                 | Retrieve a filtered list of packages                 |
| npm rebuild               | Rebuild a package                                    |
| npm repo                  | Open package repository page in the browser          |
| npm restart               | Restart a package                                    |
| npm root                  | Display npm root                                     |
| npm run-script            | Run arbitrary package scripts                        |
| npm search                | Search for packages                                  |
| npm shrinkwrap            | Lock down dependency versions for publication        |
| npm star                  | Mark your favorite packages                          |
| npm stars                 | View packages marked as favorites                    |
| npm start                 | Start a package                                      |
| npm stop                  | Stop a package                                       |
| npm team                  | Manage organization teams and team memberships       |
| npm test                  | Test a package                                       |
| npm token                 | Manage your authentication tokens                    |
| npm unstar                | Remove an item from your favorite packages           |
| npm view                  | View registry info                                   |
| npm whoami                | Display npm username                                 |
