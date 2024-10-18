<?php 

require_once 'dbConfig.php';

function insertIntoDeveloperRecords($pdo ,$firstName, $lastName, $yearGraduated, $yearsOfExperience, $skills,  $projects, $dateRegistered) {

	$sql = "INSERT INTO Gamedev (firstName, lastName, yearGraduated, yearsOfExperience, skills, projects, dateRegistered) 
            VALUES ( ?, ?, ?, ?, ?, ?, ? )";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$firstName, $lastName, $yearGraduated, $yearsOfExperience, $skills, $projects, $dateRegistered]);


	if ($executeQuery) {
		return true;	
	}
}

function seeAllDevsRecords($pdo) {
	$sql = "SELECT * FROM GameDev";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getDevById($pdo, $ID) {
	$sql = "SELECT * FROM GameDev WHERE ID = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$ID])) {
		return $stmt->fetch();
	}
}

function updateADev($pdo, $ID, $firstName, $lastName, $yearGraduated, $yearsOfExperience, $skills, $projects, $dateRegistered) {

	$sql = "UPDATE GameDev 
				SET firstName = ?, 
					lastName = ?, 
					yearGraduated = ?, 
					yearsOfExperience = ?,
                    skills = ?,
                    projects = ?,
                    dateRegistered = ?
			WHERE ID = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$firstName, $lastName, $yearGraduated, $yearsOfExperience, $skills, $projects, $dateRegistered, $ID]);

	if ($executeQuery) {
		return true;
	}
}



function deleteADev($pdo, $ID) {

	$sql = "DELETE FROM GameDev WHERE ID = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$ID]);

	if ($executeQuery) {
		return true;
	}

}


?>