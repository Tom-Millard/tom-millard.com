---

title: Git: Add, Commit and Push in One Command
tags:
-   bash
-   git
excerpt: A simple bash command to add all current changed files commit them then push them up to your designated git service function gitCommit git add -A amp amp git commit -m amp amp git push We pass in one command

---

A simple bash command to add all current changed files, commit them, then push them up to your designated git service.

```language-bash
function gitCommit(){
        git add . -A && git commit -m "$1" && git push
}
```

We pass in one command which is the commit message:

```language-bash
$ gitCommit "loving it #yolo"
```

Simply add this function to your .bash_profile and its active on new bash sessions.
