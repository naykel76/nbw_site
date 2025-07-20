# Github Quick Reference

- [Merging and Rebasing](#merging-and-rebasing)
    - [Why is Git Suddenly Asking for Merge Message?](#why-is-git-suddenly-asking-for-merge-message)
- [Stashing Changes](#stashing-changes)
- [Delete and Rename Branches](#delete-and-rename-branches)
- [Housekeeping](#housekeeping)
    - [Update Your Local List of Remote Branches](#update-your-local-list-of-remote-branches)
- [FAQ's sdf](#faqs-sdf)
    - [How do I update the local repo name when it is changed on the remote repo?](#how-do-i-update-the-local-repo-name-when-it-is-changed-on-the-remote-repo)
    - [How do I change the last commit message?](#how-do-i-change-the-last-commit-message)
    - [How do I rename a local and remote git branch?](#how-do-i-rename-a-local-and-remote-git-branch)


## Merging and Rebasing

| Command                       | Action                                 |
| :---------------------------- | :------------------------------------- |
| `git rebase -i head~N`        | Squash commits by number               |
| `git merge <branch>`          | Merge a branch                         |
| `git merge --squash <branch>` | Merge changes and into a single commit |

### Why is Git Suddenly Asking for Merge Message?

When you merge branches, Git may prompt you for a merge message if the merge
results in a conflict or if the merge is not a fast-forward merge. 

**Common Causes**
- Someone else pushed to same branch - Remote has commits you don't have locally
- Diverged branches - Local and remote have different commit histories
- Git config changed - Merge strategy switched from fast-forward to always merge

## Stashing Changes

| Command             | What it stashes                                |
| :------------------ | :--------------------------------------------- |
| `git stash push`    | Staged + unstaged tracked files                |
| `git stash push -k` | Only unstaged tracked changes                  |
| `git stash push -u` | Stash tracked + untracked changes              |
| `git stash push -a` | Stash everything (tracked, untracked, ignored) |

| Command                    | Action                            |
| :------------------------- | :-------------------------------- |
| `git stash list`           | Show all stashes                  |
| `git stash show`           | Show changes in latest stash      |
| `git stash show -p`        | Show patch (diff) of latest stash |
| `git stash pop`            | Apply latest stash and remove it  |
| `git stash drop stash@{n}` | Delete specific stash             |
| `git stash clear`          | Delete all stashes                |


## Delete and Rename Branches

| Action                    | Command                                |
| ------------------------- | -------------------------------------- |
| Delete local branch       | `git branch -d branch-name`            |
| Delete remote branch      | `git push origin --delete branch-name` |
| Force delete local branch | `git branch -D branch-name`            |


| Action                          | Command                                   |
| ------------------------------- | ----------------------------------------- |
| Rename current branch           | `git branch -m new-name`                  |
| Rename specific local branch    | `git branch -m old-name new-name`         |
| Push renamed branch to remote   | `git push origin new-name`                |
| Delete old remote branch name   | `git push origin --delete old-name`       |
| Set upstream for renamed branch | `git push --set-upstream origin new-name` |


## Housekeeping

### Update Your Local List of Remote Branches

To remove local references to remote branches that have been deleted on the
remote server (without affecting any actual branches on the remote), run:

```bash
git fetch --prune
```

This command cleans up your `.git/refs/remotes/origin/` directory by deleting
references to branches that no longer exist on the remote.

## FAQ's sdf

### <question>How do I update the local repo name when it is changed on the remote repo?</question>

If the repository's URL has changed (which often happens when the repo is renamed), update your local remote URL with:

```bash
git remote set-url origin https://github.com/yourusername/new-repo.git
```

You can verify the update with:

```bash
git remote -v
```

### <question>How do I change the last commit message?</question>

```bash
git commit --amend -m "New commit message."
```

### <question>How do I rename a local and remote git branch?</question>

```bash
# Update local repo name
git branch -m new-branch-name
# Delete old branch
git push origin --delete old-branch-name
# Push renamed branch
git push origin HEAD

# Update remote repo name
git branch --unset-upstream
# Re-set upstream
git push --set-upstream origin main
```

