package de.schoolulu.schoolulubackend.main.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

/**
 * @author Noah
 *
 */
@Entity 
@Table(name = "school")
public class School
{

	/** */
	@Id
	  @GeneratedValue(strategy=GenerationType.AUTO)
	private Long id;

	/** */
	private String schoolname;

	/** */
	private String city;
	  
	/** */
	private String zipCode;
	
	/** */
	private String street;
	
	/** */
	private String houseNumber;
	
	/** */
	private String logo;
	
	/** */
	private float score;

	  
	/**
	 * @param schoolname
	 * @param city
	 * @param place
	 * @param logo
	 * @param score
	 * @param reviews
	 */
	public School(String schoolname, String city, String zipCode, String street,
			String houseNumber, String logo, float score)
	{
		this.setSchoolname(schoolname);
		this.setCity(city);
		this.setZipCode(zipCode);
		this.setStreet(street);
		this.setHouseNumber(houseNumber);
		this.setLogo(logo);
		this.setScore(score);
	}
	
	/**
	 * 
	 */
	protected School()
	{
		// JPA
	}
	
	 
	/**
	 * @return id
	 */
	public Long getId()
	{
		return this.id;
	}

	/**
	 * @param id
	 */
	public void setId(Long id)
	{
		this.id = id;
	}

	/**
	 * @return the schoolname
	 */
	public String getSchoolname()
	{
		return schoolname;
	}

	/**
	 * @param schoolname
	 */
	public void setSchoolname(String schoolname)
	{
		this.schoolname = schoolname;
	}

	/**
	 * @return the city
	 */
	public String getCity()
	{
		return city;
	}

	/**
	 * @param city
	 * 
	 */
	public void setCity(String city) 
	{
		this.city = city;
	}

	/**
	 * @return the logo
	 */
	public String getLogo()
	{
		return logo;
	}

	/**
	 * @param logo
	 */
	public void setLogo(String logo)
	{
		this.logo = logo;
	}

	/**
	 * @return the score
	 */
	public float getScore()
	{
		return score;
	}

	/**
	 * @param score
	 */
	
	public void setScore(float score)
	{
		this.score = score;
	}

	/**
	 * @return the zipCode
	 */
	public String getZipCode() {
		return zipCode;
	}

	/**
	 * @param zipCode the zipCode to set
	 */
	public void setZipCode(String zipCode) {
		this.zipCode = zipCode;
	}

	/**
	 * @return the street
	 */
	public String getStreet() {
		return street;
	}

	/**
	 * @param street the street to set
	 */
	public void setStreet(String street) {
		this.street = street;
	}

	/**
	 * @return the houseNumber
	 */
	public String getHouseNumber() {
		return houseNumber;
	}

	/**
	 * @param houseNumber the houseNumber to set
	 */
	public void setHouseNumber(String houseNumber) {
		this.houseNumber = houseNumber;
	} 
	  
}
