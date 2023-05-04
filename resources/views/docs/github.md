# Github Cheat Sheet

<!-- MarkdownTOC -->

- [Global Config (global, system and local)](#global-config-global-system-and-local)
- [GIT Branches](#git-branches)
- [Repositories](#repositories)
- [Commit and Push](#commit-and-push)
  - [How to change commit message](#how-to-change-commit-message)
- [Git Merge, Squash, Rebase and Conflicts](#git-merge-squash-rebase-and-conflicts)
  - [Merge changes and into a single commit. `--squash`](#merge-changes-and-into-a-single-commit---squash)
- [Create and Modify Repositories](#create-and-modify-repositories)
- [GIT Stash](#git-stash)
- [Releases \& Version Tags](#releases--version-tags)
- [Creating Alias](#creating-alias)
  - [Create Alias to Clone Repo](#create-alias-to-clone-repo)

<!-- /MarkdownTOC -->

```bash
git log --oneline
git diff             # Show the difference between branches (merge conflicts)


git rm -rf --cached . # refresh git cache
git reset --hard && git clean -df
```



<a id="global-config-global-system-and-local"></a>
## Global Config (global, system and local)

Can change `local|global|system` flag to display different configuration settings.

```bash
git config --list                               # display global settings

git config --global user.name myusername        # change name
git config --global user.email myemail          # change email
git config --global github.user myusername      # change username
```




<a id="git-branches"></a>
## GIT Branches

```bash
git branch [branch]                       # Create new branch
git checkout [branch]                     # Checkout branch
git checkout -b [branch]                  # Create new branch and checkout

git branch -d [branch]                    # Delete branch
git push --delete origin [branch]         # Delete remote branch

git push --set-upstream origin [branch]   # Push branch to remote
```

<a id="repositories"></a>
## Repositories

```bash
git reset --soft HEAD~1         # Restore last commit but keep changes
git reset --hard HEAD~1         # Restore last commit and delete changes
```

<a id="commit-and-push"></a>
## Commit and Push


```bash
git add .                       # Stage Files

git commit -m 'commit message'  # Commit files
git commit -am 'message'        # stage, add comment and commit

git push origin master          # Push to server
git push && git push --tags     # Push with tags
git push origin [branch]        # Push branch to server
```


<a id="how-to-change-commit-message"></a>
### How to change commit message

Run the following command to amend (change) the message of the latest commit:

    git commit --amend -m "New commit message."

<a id="git-merge-squash-rebase-and-conflicts"></a>
## Git Merge, Squash, Rebase and Conflicts

```bash
git rebase -i head~N            # Squash commits by number
git rebase -i [hash]            # Squash commits by hash
git merge [branchToMerge]       # Merge branch

git merge --abort               # Cancel merge
```


<a id="merge-changes-and-into-a-single-commit---squash"></a>
### Merge changes and into a single commit. `--squash`

``` bash
git merge --squash [branch]
```

<a id="create-and-modify-repositories"></a>
## Create and Modify Repositories

```bash
git init                                            # Initialise git
git config --global user.name 'Your Name'           # set user name
git config --global user.email 'you@email.com.au'   # set email
git clone github-URL                                # Clone repo
git remote set-url origin new-URL                   # change repo location
git remote add origin new-URL                       # change repo location
git remote -v                                       # Check repo location
```

<a id="git-stash"></a>
## GIT Stash

| Category | Action                 | Command          |
| :------- | :--------------------- | :--------------- |
| Stash    | Stash changes          | `git stash`      |
| Stash    | Get changes from stash | `git stash pop`  |
| Stash    | Show stash list        | `git stash list` |
| Stash    | Show changes in stash  | `git stash show` |

git stash drop [-q|--quiet][<stash>]
git stash clear
git stash create [<message>]
git stash store [-m|--message <message>][-q|--quiet] <commit>

Put in stash: git stash save 'Message'


<a id="releases--version-tags"></a>
## Releases & Version Tags

| Action                                   | Command                           | Notes          |
| :--------------------------------------- | :-------------------------------- | :------------- |
| Update tag                               | `git push -f --tags`              | Force push tag |
| Show all released versions               | `git tag`                         |                |
| Show all released versions with comments | `git tag -l -n1`                  |                |
| Create release version                   | `git tag v1.0.0`                  |                |
| Create release version with comment      | `git tag -a v1.0.0 -m 'Message'`  |                |
| Checkout a specific release version      | `git checkout v1.0.0`             |                |
| Delete remote tag                        | `git tag --delete origin tagname` |                |
| Delete local tag                         | `git tag --delete tagname`        |                |



<a id="creating-alias"></a>
## Creating Alias

git config --global alias.nk branch clone https://github.com/naykel76/laravel-starter"

how can i change this to accept two argument where the first argument is the repositor name and the second is option to name the folder to clone to?
git config --global alias.naykel 'clone https://github.com/naykel76/argument1 argument2'

git config --global alias.naykel '!'"git clone https://github.com/naykel76/\$1 argument2"


<a id="create-alias-to-clone-naykel-repo"></a>
### Create Alias to Clone Repo

  git nk <repository> <target-directory>
  git nk laravel_starter <target-directory>

```bash
git config --global alias.naykel '!'"f() { git clone https://github.com/naykel76/\$1 \$2; }; f"
```

naykel = !git clone https://github.com/naykel/$1 $2



[alias]
files = "!f() { git diff --name-status \"$1^\" \"$1\"; }; f"

An alias without ! is treated as a Git command; e.g. commit-all = commit -a.

With the !, it's run as its own command in the shell, letting you use stronger magic like this.


