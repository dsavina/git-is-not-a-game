# git-is-not-a-game

This project offers an example of WRONGLY-formed commits, leading to complications when updating before delivery.

## I. A bit of theory

### 1. What is "merge"?

The action of merging branch `B` into branch `A` creates a new commit having two parents, and incorporating changes from
`B` into `A`. Conflicts may then occur; their resolution shall be versioned in the new merge commit.

    0   [branch A] merge B into A
    |\
    | \
    |  0 [branch B] fix/things
    0  |
    |  0 do some stuff on B
    |  |
    |  0 do some stuff on B
    0  | do some stuff on B
    | /
    |/
    0
    |
    ...

Be careful to merge the right branch: merging A into B or B into A will basically result in the same changes/conflicts,
and the same resolutions. But the history will NOT be the same.
A common mistake I've met is to merge upstream into local branch, then pushing local branch; since it is indeed ahead of
upstream, the push is possible, but the reading of the history will be wrong. Keep in mind that using option
`--first-parent` (`git log`, `gitk`) must offer a very brief overview of the life of a branch, and if you handle your
repository with a `git flow` philosophy, this your master and dev branches should only show merge commits!

    0 [dev] merge fix/some-stuff into dev
    |\
    | \
    |   ...
    0 merge feature/some-stuff into dev
    |\
    | \
    |   ...
    |
    ...


### 2. What is "rebase"?

Just like merging, rebasing aims to recover some changes that occurred on a branch you have diverged from.
Unlike merging, it actually changes the chronology of the changes, so that, once you're done, your local work occurs AFTER
changes retrieved from upstream. Think of it like a **plant cutting**: you pick your local commits, and replace them on top
of a fast-forwarded re-updated branch. Let's say you have local commits A0, B0 and C0, and you have diverged from your
upstream after it has introduced commits X and Y. This will introduce new commits A1, B1 and C1, respectively the
resolution of picking A0, B0 and C0 on top of upstream.
If you are dependant of new commits X and Y, rebasing will basically do this:

       ___                                        _____________
      [   ]                                      [             ]
      [ 0 ]  [local] commit C0                   [ 0 commit C1 ]
      [ | ]                                      [ |           ]
    0 [ | ]  [upstream]commit Y                  [ 0 commit B1 ]
    | [ | ] -----------------------------------> [ |           ]
    | [ 0 ]  commit B0                           [ 0 commit A1 ]
    | [ | ]                                      [_|___________]
    0 [ | ]  commit X                              |
    | [ | ]                                        0 commit Y
    | [ 0 ]  commit A0                             |
    | [_|_]                                        0 commit X
    |  /                                           |
    | /                                            |
    |/                                             |
    0                                              0
    |                                              |
    ...                                            ...


## II. Application

*Synopsis: you are working on your local branch fix/foo; your upstream, dev, has recently pulled branch feature/do-some-shit,
introducing conflicts with your modifications. Hence, before you can merge fix/foo into dev, you will have to update your local
branch.*

First, checkout on branch fix/foo:
```bash
git branch fix/foo origin/fix/foo
git checkout fix/foo
git reset HEAD~1    # simulate local changes
```

Our goal is now to update local branch fix/foo in order to merge it in dev; several methods are commonly used to that end.

### 1. Merge upstream into local branch

Merge remote in local branch, resolve conflicts and merge local branch back in dev. Of course, you do not want to lose
your local changes in the process. Some people would stash local changes, merge upstream and pop the stashed changes once
conflicts have been resolved:
```bash
git stash
git merge origin/dev
... # resolve conflicts
git commit -m "merge remote branch dev into fix/foo"
git stash pop
```
Some other people would even commit local changes before pulling upstream:
```bash
git commit -a -m "commit for pull"  # Yes, seriously
git merge origin/dev
... # resolve conflicts
git commit -m "merge remote branch dev into fix/foo"
```
I consider this second option to be profoundly insulting; if you hate git, just leave it alone, and stop shitting all
over the place.

### 2. Rebase your local branch

This is, in my opinion, the proper way to update your branch: if you are dependant to the changes made on the upstream
(and since there are conflicts, you most probably are), it seems logical to consider that your work should be chronologically
placed AFTER these changes. Therefore, merging the upstream does not indicate clearly that state of mind. Rebasing does.
Sadly, your commits are totally shitty, and every single one will need conflict resolution... Good luck with that.

### 3. Clean your room!

It is crucial that you understand that all non-pushed commits are editable. You made a tiny stupid mistake 17 commits ago?
It seems to me that it's no one's bizwax to be aware of your clumsiness; don't make a new commit "I apologize", simply edit
the existing one! To that end, interactive rebase (command `git rebase -i <sha1>`) is your best friend. And sometimes,
you just have to recognize that you totally lost control, and it's probably more practical to simply burn your room and
rebuild it: `git reset --soft <sha1>`. As long as you don't try to edit something that has been shared, you don't risk much.

*Note: Some might even think about squashing all their local commit into one unique commit before submitting their merge
request. This is basically the contemporary version of a USB flash drive.*
