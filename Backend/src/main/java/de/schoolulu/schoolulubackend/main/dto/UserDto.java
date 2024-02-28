package de.schoolulu.schoolulubackend.main.dto;

import com.fasterxml.jackson.annotation.JsonProperty;

/**
 * @author Silas
 *
 */
public class UserDto {

	/** */
	@JsonProperty("id")
	Long id;

	/** */
	@JsonProperty("name")
	String name;

	/** */
	@JsonProperty("email")
	String email;

	@JsonProperty("session_token")
	String sessionToken;

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
	 * @return name
	 */
	public String getName() {
		return this.name;
	}

	/**
	 * @param name
	 */
	public void setName(String name) {
		this.name = name;
	}

	/**
	 * @return email
	 */
	public String getEmail() {
		return this.email;
	}

	/**
	 * @param email
	 */
	public void setEmail(String email) {
		this.email = email;
	}

	/**
	 * @return session token
	 */
	public String getSessionToken() {
		return this.sessionToken;
	}

	/**
	 * @param sessionToken
	 */
	public void setSessionToken(String sessionToken) {
		this.sessionToken = sessionToken;
	}

}
