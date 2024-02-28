package de.schoolulu.schoolulubackend.main.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "review_content")
public class ReviewContent {

	/** */
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private Long id;

	private int competence;

	private int atmosphere;

	private int roomEquipment;

	private int equality;

	private int mateHandling;

	private int accessibility;

	private int transportConnections;

	private int parkingSpot;

	private int internet;

	private int toilets;

	private int canteen;

	public int getCompetence() {
		return competence;
	}

	public void setCompetence(int competence) {
		this.competence = competence;
	}

	public int getAtmosphere() {
		return atmosphere;
	}

	public void setAtmosphere(int atmosphere) {
		this.atmosphere = atmosphere;
	}

	public int getRoomEquipment() {
		return roomEquipment;
	}

	public void setRoomEquipment(int roomEquipment) {
		this.roomEquipment = roomEquipment;
	}

	public int getEquality() {
		return equality;
	}

	public void setEquality(int equality) {
		this.equality = equality;
	}

	public int getMateHandling() {
		return mateHandling;
	}

	public void setMateHandling(int mateHandling) {
		this.mateHandling = mateHandling;
	}

	public int getAccessibility() {
		return accessibility;
	}

	public void setAccessibility(int accessibility) {
		this.accessibility = accessibility;
	}

	public int getTransportConnections() {
		return transportConnections;
	}

	public void setTransportConnections(int transportConnections) {
		this.transportConnections = transportConnections;
	}

	public int getParkingSpot() {
		return parkingSpot;
	}

	public void setParkingSpot(int parkingSpot) {
		this.parkingSpot = parkingSpot;
	}

	public int getInternet() {
		return internet;
	}

	public void setInternet(int internet) {
		this.internet = internet;
	}

	public int getToilets() {
		return toilets;
	}

	public void setToilets(int toilets) {
		this.toilets = toilets;
	}

	public int getCanteen() {
		return canteen;
	}

	public void setCanteen(int canteen) {
		this.canteen = canteen;
	}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

}
