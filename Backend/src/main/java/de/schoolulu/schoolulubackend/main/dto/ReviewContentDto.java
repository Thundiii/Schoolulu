package de.schoolulu.schoolulubackend.main.dto;

import com.fasterxml.jackson.annotation.JsonProperty;

public class ReviewContentDto {

	@JsonProperty("id")
	private long id;

	@JsonProperty("competence")
	private int competence;

	@JsonProperty("atmosphere")
	private int atmosphere;

	@JsonProperty("roomEquipment")
	private int roomEquipment;

	@JsonProperty("equality")
	private int equality;

	@JsonProperty("mateHandling")
	private int mateHandling;

	@JsonProperty("accessibility")
	private int accessibility;

	@JsonProperty("transportConnections")
	private int transportConnections;

	@JsonProperty("parkingSpot")
	private int parkingSpot;

	/**
	 * 
	 */
	@JsonProperty("internet")
	private int internet;

	/**
	 * 
	 */
	@JsonProperty("toilets")
	private int toilets;

	/**
	 * 
	 */
	@JsonProperty("canteen")
	private int canteen;

	public long getId() {
		return id;
	}

	public void setId(long id) {
		this.id = id;
	}

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

}
