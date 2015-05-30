Documentation of the verification of the migration of the RuleML website from NRC to Hawkhost.
The program Main.hs compares two list of file names, one being the "original", derived from the ballistic backup, and the other the "migrated" list, obtained from the live website on Hawkhost.
The output is a list of original files that are not present, under the same file name, at least, in the migrated list.
Uncertainty: 
1. The filename is considered sufficient to determine presence. In actuality there are certain filenames that are recurring, e.g. "index.html".
2. If the filename is missing, it may have been renamed. The list of original files has been modified to remove files that are known to have been moved in the migration.
3. The assumption is made that the ballistic backup, and the local extraction of the archive, was complete. There is no known means to verify this assumption.
4. Dot files are omitted, under the assumption that the important ones, exp. .hataccess files, where migrated or their effects were recreated elsewhere. The NRC website did not use dot files frequently.
5. Certain files are omitted from the "originals" list that were intentionally deleted after migration (see the listBallistic.php script for details).

Prerequisites: the ability to run bash and PHP (5.4) scripts, and to compile and run Haskell programs. Modify file paths as necessary.
Procedure: Run the bash script verify.sh
1. Two php scripts are called that create the file lists. These are saved locally, and serve as input to the Haskell program.
2. The Haskell program is compiled and executed using GHC (7.8.3).
