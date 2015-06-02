Documentation of the verification of the migration of the RuleML website from NRC to Hawkhost.
The Haskell program Main.hs compares two list of file names, one being the "original", derived from the ballistic backup, and the other the "migrated" list, obtained from the live website on Hawkhost.
The output is a list of original files that are not present, under the same file name, at least, in the migrated list, along with properties including path to directory, size and last modified date.
Uncertainty: 
1. The filename is considered sufficient to determine presence. This makes the assumption that there is no repitition of filenames. In actuality there are certain filenames that are used repeatedly, e.g. "index.html". However, these are files of low priority in terms of this analysis, because if missing, they are either routine redirections that have been replaced by .htaccess rewrite rules, or have been superceded by wiki pages.
2. If the filename is missing, it may have been renamed. The list of original files has been modified to remove files that are known to have been renamed after the migration.
3. The assumption is made that the ballistic backup, and the local extraction of the archive, was complete. There is no known means to verify this assumption.
4. Dot files are omitted from the analysis, under the assumption that the important ones, esp. .hataccess files, were migrated or their effects were recreated elsewhere. The NRC website did not use dot files frequently.
5. Certain files are omitted from the "originals" list that were intentionally deleted after migration (see the listBallistic.php script for details).

Prerequisites: the ability to run bash and PHP (5.4) scripts and to compile and run Haskell programs on the platform where there is a clone of this Github repository. An extraction of the ballistic backup archive is also required. Modify file paths as necessary to point to the location of the ballistic backup extraction as well as executables.
Procedure: Run the bash script verify.sh in a local clone, to execute the following steps:
1. Two php scripts are called (one local, one remote on the Hawkhost server) that create the file lists. The output is are saved locally, and serve as input to the Haskell program.
2. The Haskell program is compiled and executed locally using GHC (7.8.3). It is served on the Hawkhost server only for archival purposes.
