# Github Cheat Sheet


- [General Terminology](#general-terminology)
- [Basic Commands](#basic-commands)
- [Add, Commit and Push](#add-commit-and-push)
- [Configurations](#configurations)
- [Remote Repositories](#remote-repositories)
- [Branching and Merging](#branching-and-merging)
- [Merge, Rebase and Squash](#merge-rebase-and-squash)
- [Housekeeping](#housekeeping)
- [Resetting and Reverting](#resetting-and-reverting)
- [Release and Version Tags](#release-and-version-tags)
- [Stashing Changes](#stashing-changes)
- [Creating Alias](#creating-alias)
  - [Create Alias to Clone Repo](#create-alias-to-clone-repo)
- [FAQ's](#faqs)
    - [How do I update the local repo name when it is changed on the remote repo?](#how-do-i-update-the-local-repo-name-when-it-is-changed-on-the-remote-repo)
    - [How do I change the last commit message?](#how-do-i-change-the-last-commit-message)


## General Terminology

`origin` is the default name given to the remote repository when you clone a repository. You can
change it to any name you want.

## Basic Commands

<div class="code-first-col"></div>

| Command              | Action                       |
| :------------------- | :--------------------------- |
| git init             | Initialize a new repository  |
| git clone <repo-url> | Clone a repository           |
| git status           | Show the working tree status |
| git log              | Show commit logs             |
| git log --oneline    | Show commit logs one line    |

## Add, Commit and Push

<div class="code-first-col"></div>

| Command                     | Action                        |
| :-------------------------- | :---------------------------- |
| git add <file>              | Add file(s) to staging area   |
| git add .                   | Add all files to staging      |
| git commit -am 'message'    | Stage, add comment and commit |
| git commit -m 'message'     | Commit files                  |
| git push && git push --tags | Push with tags                |
| git push origin [branch]    | Push branch to server         |
| git push origin master      | Push to server                |

## Configurations

<div class="code-first-col"></div>

| Command                                | Action                     |
| :------------------------------------- | :------------------------- |
| git config --global <key> <value>      | Set global config          |
| git config --local <key> <value>       | Set local config           |
| git config --global user.name <name>   | set global user name       |
| git config --global user.email <email> | set global config email    |
| git config --global github.user <name> | set global github username |
| git config --list                      | List all configs           |

## Remote Repositories

<div class="code-first-col"></div>

| Command                       | Action                    |
| :---------------------------- | :------------------------ |
| git remote add origin <url>   | Add a remote repository   |
| git fetch origin              | Fetch changes from remote |
| git pull origin <branch>      | Pull changes from remote  |
| git push origin <branch>      | Push changes to remote    |
| git remote rename <old> <new> | Rename remote repository  |
| git remote remove <name>      | Remove remote repository  |

## Branching and Merging

<div class="code-first-col"></div>

| Command                   | Action                             |
| :------------------------ | :--------------------------------- |
| git branch                | List all branches                  |
| git branch -a             | List all branches (local & remote) |
| git branch -d <branch>    | Delete a local branch              |
| git branch -m <old> <new> | Rename branch                      |
| git branch <branch>       | Create a new branch                |
| git checkout -b <branch>  | Create branch and switch           |
| git checkout <branch>     | Switch to a branch                 |


## Merge, Rebase and Squash

| Command                     | Action                                 |
| :-------------------------- | :------------------------------------- |
| git rebase -i head~N        | Squash commits by number               |
| git merge --abort           | Cancel merge                           |
| git merge <branch>          | Merge a branch                         |
| git merge --squash <branch> | Merge changes and into a single commit |

## Housekeeping

<div class="code-first-col"></div>

| Command                              | Action                                             |
| :----------------------------------- | :------------------------------------------------- |
| git clean -df                        | Remove untracked files                             |
| git gc                               | Garbage collection. Optimizes the local repository |
| git prune                            | Prune unreachable objects                          |
| git push origin --delete branch-name | Delete remote branch  (local & repo)               |
| git reset --hard && git clean -df    | Reset to last commit and remove untracked files    |
| git rm -rf --cached .                | refresh git cache                                  |

## Resetting and Reverting
| Command                    | Action          |
| :------------------------- | :-------------- |
| git reset --soft <commit>  | Soft reset      |
| git reset --mixed <commit> | Mixed reset     |
| git reset --hard <commit>  | Hard reset      |
| git revert <commit>        | Revert a commit |

```bash
git reset --soft HEAD~1         # Restore last commit but keep changes
git reset --hard HEAD~1         # Restore last commit and delete changes
```

## Release and Version Tags

<div class="code-first-col"></div>

| Command          | Action       |
| :--------------- | :----------- |
| git tag <tag>    | Create a tag |
| git tag          | List tags    |
| git tag -d <tag> | Delete a tag |

## Stashing Changes

<div class="code-first-col"></div>

| Command         | Action                 |
| :-------------- | :--------------------- |
| git stash       | Stash changes          |
| git stash clear | Clear all stashes      |
| git stash drop  | Drop a stash           |
| git stash list  | Show stash list        |
| git stash pop   | Get changes from stash |
| git stash show  | Show changes in stash  |


## Creating Alias

git config --global alias.nk branch clone https://github.com/naykel76/laravel-starter"

how can i change this to accept two argument where the first argument is the repositor name and the second is option to name the folder to clone to?
git config --global alias.naykel 'clone https://github.com/naykel76/argument1 argument2'

git config --global alias.naykel '!'"git clone https://github.com/naykel76/\$1 argument2"


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


## FAQ's

#### <question>How do I update the local repo name when it is changed on the remote repo?</question>

If the repository's URL has also changed (which is common when the name changes), you need to update
the URL for your remote. You can do this with:

```bash
git remote set-url origin https://github.com/yourusername/new-repo.git
```

Verify the changes with:

```bash
git remote -v
```

#### <question>How do I change the last commit message?</question>

```bash
git commit --amend -m "New commit message."
```