ruleml-website
==============

Static files used to generate the RuleML website, except for 1.0+ specifications and the /usecases directory. 
There is a separate repository for Deliberation RuleML (https://github.com/RuleML/deliberation-ruleml) 
and another for the usecases (https://github.com/RuleML/ruleml-usecases).

Prerequisites
-------------
1. To contribute to this repository, You must have Git installed on your system. See [7].
   
Initialization
--------------
1. Fork to create a public repo in your own Github account. 
I'll use my account (greenTara) for the examples. 
You should replace "greenTara" with your Github user name.

2. Clone the central repo to your local computer using the read-only URL.([1])

    $ cd path/to/directory/of/Git/repositories  
    $ git clone git://github.com/RuleML/ruleml-website.git
    
3. Enter the local repository

    $ cd ruleml-website
4. Add your forked repository as a read-write remote.([2])

    $ git remote add myFork https://github.com/greenTara/ruleml-website.git
    
5. Other configuration steps, such as providing your name and email so your commits can be identified
   should be performed at this point, if they haven't been done already.

    $ git config --global user.name "Tara Athan"
    
    $ git config --global user.email "taraathan AT gmail.com"
    
    $ git config --global push.default simple

Modifying the RuleML Website
----------------------------
1. Update your local clone from the ruleml remote.([2])

    $ git pull
        
2. Modify your local clone:  
  a) Make your changes in your usual working environment (plain text eclipse, oXygen, ...), and test your modifications  
  b) Optional: If you add or delete files or folders, use  

    $ git add -A

  c) Commit frequently, using messages that are helpful to you,([4], [6])  

    $ git commit -a
    
  d) Repeat a-c, or continue to the next step.
    
   
3. When your fix is finished (or far enough along that you want some review), 
  update your repository (again) from the RuleML repo online.([2])
  This time, instead of using "pull" (which is a shortcut for "fetch-merge"), we will use 
  "fetch-rebase".
  Rebase is an alternative to merge that re-writes history regarding the order and granularity of commits[5].

  a) Fetch from the central RuleML repository:
  
    $ git fetch
    
  b) If nothing was fetched, and you made only one or a few commits, you may continue with step 4.
   Otherwise, rebase* interactively:
   
    $ git rebase -i

  c) There may be conflicts from this fetch-rebase that need to be resolved at this point.
To avoid such conflicts, maintain communication with other contributors to avoid
simultaneously modifying the same portion of the website.
The github issue-tracker can be used for this purpose.
        
4. Push your commits to your remote fork.([2])

    $ git push myFork master
    
5. Login to your Github account and perform the following:  
  a) verify that everything got uploaded OK  
  b) submit a pull request to RuleML/ruleml-website from your Github account.  

6. The RuleML maintainer and/or other developers will make comments on your pull-request if 
anything needs to be changed.
You can push new commits to your local fork and they will automatically be added to the pull-request.
If your pull-request is accepted, your commits will be add to the central RuleML/ruleml-website repository.
They will then be propagated to other forks when Step #1 or Step #3 is 
executed by any user. The RuleML repository will not make announcements of modifications or create pull-requests.

*Note: you should not execute the rebase command again until these commits have been accepted into the central repository.

Diagram
-------

Triangular GITHUB/GIT flow:

            pull request
    my fork ---------> central repo         GITHUB
           ^        /
       push \      / pull(or fetch/rebase)
             \    v 
          local clone                       GIT

GUI Clients
-----------
1. TortoiseGit([8]) is capable of all of the above commands, including interactive rebase.

[1]:http://git-scm.com/book/en/Git-Basics-Getting-a-Git-Repository
[2]:http://git-scm.com/book/en/Git-Basics-Working-with-Remotes
[4]:http://git-scm.com/book/en/Git-Basics-Recording-Changes-to-the-Repository
[5]:http://git-scm.com/book/en/Git-Branching-Rebasing
[6]:http://git-scm.com/book/en/Getting-Started-Git-Basics
[7]:http://git-scm.com/book/en/Getting-Started-Installing-Git
[8]:http://code.google.com/p/tortoisegit/
