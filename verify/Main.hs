import System.IO
import Data.List

main = do
  -- get the files from the original
  orighandle <- openFile "/Users/taraathan/Repositories/RuleML/Github/ruleml.org/verify/filesOriginal.txt" ReadMode
  origcontents <- hGetContents orighandle
  let origlinesOfFiles = lines origcontents
  -- filter out some that we know have been deleted
  -- let soriglinesOfFiles = sort origlinesOfFiles
  
  mighandle <- openFile "/Users/taraathan/Repositories/RuleML/Github/ruleml.org/verify/filesMigrated.txt" ReadMode
  migcontents <- hGetContents mighandle
  let miglinesOfFiles = lines migcontents
  -- let smiglinesOfFiles = sort miglinesOfFiles
  let nottab c = (not (c == '\t'))
  let matchfilename filename x = (filename == takeWhile nottab x)
  let filmig filename = filter (matchfilename filename) miglinesOfFiles
  let num filename = length (filmig filename)
  let absent filename = ((num filename) == 0)
  let absentRecord r = absent (takeWhile nottab r)
  let aboriglinesOfFiles = filter absentRecord origlinesOfFiles
  mapM putStrLn aboriglinesOfFiles
  hClose orighandle
  hClose mighandle
  