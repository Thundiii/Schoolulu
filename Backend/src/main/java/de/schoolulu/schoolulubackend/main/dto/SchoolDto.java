package de.schoolulu.schoolulubackend.main.dto;

import com.fasterxml.jackson.annotation.JsonProperty;

/**
 * @author Noah
 *
 */
public class SchoolDto {

	/** */
	@JsonProperty("id")
	Long id;

	/** */
	@JsonProperty("schoolname")
	String schoolname;

	/** */
	@JsonProperty("city")
	String city;

	/** */
	@JsonProperty("zipCode")
	String zipCode;

	/** */
	@JsonProperty("street")
	String street;
	
	/** */
	@JsonProperty("houseNumber")
	String houseNumber;
	
	/** */
	@JsonProperty("logo")
	String logo;

	/** */
	@JsonProperty("score")
	float score;

	/**
	 * @return id
	 */
	public Long getId() {
		return this.id;
	}

	/**
	 * @param id
	 */
	public void setId(Long id) {
		this.id = id;
	}

	/**
	 * @return schoolname
	 */
	public String getSchoolname() {
		return this.schoolname;
	}

	/**
	 * @param schoolname
	 */
	public void setSchoolname(String schoolname) {
		this.schoolname = schoolname;
	}

	/**
	 * @return city
	 */
	public String getCity() {
		return this.city;
	}

	/**
	 * @param city
	 */
	public void setCity(String city) {
		this.city = city;
	}

	/**
	 * @return place
	 */
	public String getZipCode() {
		return this.zipCode;
	}

	/**
	 * @param place
	 */
	public void setZipCode(String zipCode) {
		this.zipCode = zipCode;
	}

	public String getStreet() {
		return street;
	}

	public void setStreet(String street) {
		this.street = street;
	}

	public String getHouseNumber() {
		return houseNumber;
	}

	public void setHouseNumber(String houseNumber) {
		this.houseNumber = houseNumber;
	}

	/**
	 * @return logo
	 */
	public String getLogo() {
		return this.logo;
	}

	/**
	 * @param logo
	 */
	public void setLogo(String logo) {
		this.logo = logo;
	}

	/**
	 * @return score
	 */
	public float getScore() {
		return this.score;
	}

	/**
	 * @param score
	 */
	public void setScore(float score) {
		this.score = score;
	}

}
