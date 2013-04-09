The profiles contained in this folder are a work in progress in order to upgrade WR2. The major changes seen here are:

-Simplified the fitness level schema by removing location, and ambience.
Reason: Location and Ambience should not factor in to the fitness level for the day as they are details which the user will not likely require.

-Used a special-purpose 'duration' structure measured in (hour, minute) instead of reusing the 5-argument dateTime structure that has the 3 arguments (year, month, day) 'zeroed out'. Use duration[hour, minute] instead of dateTime[0, 0, 0, hour, minute].
Reason: These variables are really unneeded as durations are not logically greater than a day.

They have not yet been tested. These changes are mentioned in the Rule Responder Roadmap 0.65
http://wiki.ruleml.org/index.php/Rule_Responder:RoadMap