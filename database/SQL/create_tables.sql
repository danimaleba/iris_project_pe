use iris_db;

CREATE TABLE iris_db.users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    idPesquisa INT(11),
    name VARCHAR(100) NOT NULL,
    login VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    contato Varchar(20),
    status TINYINT DEFAULT 0,
    `password` VARCHAR(255) NOT NULL
);

CREATE TABLE studies (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	responsableUser INT(11),
	idUniversity INT(11)
);

CREATE TABLE universities (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	acronym VARCHAR(10)
);

CREATE TABLE participants (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	idStudy INT(11) DEFAULT 1,
	uat VARCHAR(255),
	smartWatch VARCHAR(100),
  sex CHAR(1),
  birthday DATE,
	date_in DATE,
	date_out DATE
);

CREATE TABLE activities (
userId VARCHAR(255),
summaryId VARCHAR(255),
activityId INT,
activityName VARCHAR(255),
activityDescription VARCHAR(255),
isParent boolean,
parentSummaryId VARCHAR(255),
durationInSeconds INT,
startTimeInSeconds INT,
startTimeOffsetInSeconds INT,
activityType VARCHAR(255),
averageBikeCadenceInRoundsPerMinute FLOAT,
averageHeartRateInBeatsPerMinute INT,
averageRunCadenceInStepsPerMinute FLOAT,
averagePushCadenceInPushesPerMinute FLOAT,
averageSpeedInMetersPerSecond FLOAT,
averageSwimCadenceInStrokesPerMinute FLOAT,
averagePaceInMinutesPerKilometer FLOAT,
activeKilocalories INT,
deviceName VARCHAR(255),
distanceInMeters FLOAT,
maxBikeCadenceInRoundsPerMinute FLOAT,
maxHeartRateInBeatsPerMinute INT,
maxPaceInMinutesPerKilometer FLOAT,
maxRunCadenceInStepsPerMinute FLOAT,
maxPushCadenceInPushesPerMinute FLOAT,
maxSpeedInMetersPerSecond FLOAT,
numberOfActiveLengths INT,
startingLatitudeInDegree DECIMAL(12,9),
startingLongitudeInDegree DECIMAL(12,9),
steps INT,
pushes INT,
totalElevationGainInMeters FLOAT,
totalElevationLossInMeters FLOAT,
manual boolean,
isWebUpload boolean,
updated_at DATETIME,
created_at DATETIME
);

CREATE TABLE dailies (
  userId VARCHAR(255),
  summaryId VARCHAR(255),
  calendarDate VARCHAR(255),
  activityType VARCHAR(255),
  activeKilocalories INT,
  bmrKilocalories INT,
  steps INT,
  pushes INT,
  distanceInMeters number($float)
  pushDistanceInMeters number($float)
  durationInSeconds INT,
  activeTimeInSeconds INT,
  startTimeInSeconds INT,
  startTimeOffsetInSeconds INT,
  moderateIntensityDurationInSeconds INT,
  vigorousIntensityDurationInSeconds INT,
  floorsClimbed INT,
  minHeartRateInBeatsPerMinute INT,
  maxHeartRateInBeatsPerMinute INT,
  averageHeartRateInBeatsPerMinute INT,
  restingHeartRateInBeatsPerMinute INT,
  timeOffsetHeartRateSamples JSON,
  source VARCHAR(255),
  stepsGoal INT,
  pushesGoal INT,
  intensityDurationGoalInSeconds INT,
  floorsClimbedGoal INT,
  averageStressLevel INT,
  maxStressLevel INT,
  stressDurationInSeconds INT,
  restStressDurationInSeconds INT,
  activityStressDurationInSeconds INT,
  lowStressDurationInSeconds INT,
  mediumStressDurationInSeconds INT,
  highStressDurationInSeconds INT,
  stressQualifier VARCHAR(255),
  updated_at DATETIME,
  created_at DATETIME
);

CREATE TABLE epoches (
participantId INT,
summaryId VARCHAR(256),
activityType VARCHAR(256),	
activeKilocalories SMALLINT,
steps INT,
distanceInMeters FLOAT,
durationInSeconds INT,
activeTimeInSeconds INT,
startTimeInSeconds INT,
startTimeOffsetInSeconds INT,
met	DECIMAL(12,9),
intensity VARCHAR(256),
meanMotionIntensity	DECIMAL(12,9),
maxMotionIntensity DECIMAL(12,9),
created_at DATETIME,
updated_at DATETIME
);
CREATE TABLE hrvs (
participantId INT,
summaryId VARCHAR(256),
calendarDate DATE,
lastNightAvg INT,
lastNight5MinHigh INT,
startTimeOffsetInSeconds INT,
durationInSeconds INT,
startTimeInSeconds INT,
hrvValues TEXT,
created_at DATETIME,
updated_at DATETIME
);
CREATE TABLE pulses_ox (
participantId INT,
summaryId VARCHAR(256),
calendarDate DATETIME,
startTimeInSeconds INT,
durationInSeconds INT,
startTimeOffsetInSeconds INT,
timeOffsetSpo2Values_0 INT,
timeOffsetSpo2Values_3600 INT,
onDemand TINYINT,
created_at DATETIME,
updated_at DATETIME
);
CREATE TABLE respirations (
  participantId INT,
  summaryId VARCHAR(256),
  startTimeInSeconds INT,
  durationInSeconds INT,
  startTimeOffsetInSeconds INT, 
  timeOffsetEpochToBreaths VARCHAR(250),
  timeOffset300 DECIMAL(12,9),
  timeOffset420 DECIMAL(12,9),
  timeOffset540 DECIMAL(12,9),
  created_at DATETIME,
  updated_at DATETIME
);
CREATE TABLE sleeps (
participantId INT,
summaryId VARCHAR(256),
calendarDate DATE,
durationInSeconds INT,
startTimeInSeconds INT,
startTimeOffsetInSeconds INT,
unmeasurableSleepInSeconds INT,
deepSleepDurationInSeconds INT,
lightSleepDurationInSeconds INT,
remSleepInSeconds INT,
awakeDurationInSeconds INT,
validation VARCHAR(256),
timeOffsetSleepSpo2 VARCHAR(256),
overallSleepScore VARCHAR(256),
sleepScores TEXT,
created_at DATETIME,
updated_at DATETIME
);



