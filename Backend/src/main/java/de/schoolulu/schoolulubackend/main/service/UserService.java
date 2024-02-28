package de.schoolulu.schoolulubackend.main.service;

import java.util.List;

import de.schoolulu.schoolulubackend.main.dto.UserDto;
import de.schoolulu.schoolulubackend.main.entity.User;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

/**
 * @author Silas
 *
 */
public interface UserService {

	/**
	 * @param username
	 * @param email
	 * @param password
	 */
	void create(String username, String email, String password);

	/**
	 * @param userid
	 */
	void delete(Long userid);

	/**
	 * @param userid
	 * @param dto
	 */
	void edit(Long userid, UserDto dto);

	/**
	 * @return all users
	 */
	List<UserDto> getAllUsers();

	/**
	 * @param username
	 * @param hashedPassword
	 * @param response
	 * @return user dto
	 */
	UserDto login(String username, String hashedPassword, HttpServletResponse response);

	/**
	 * @param userId
	 */
	void logOut(HttpServletRequest request, HttpServletResponse response);

	/**
	 * @param user
	 * @param token
	 */
	void addSessionToken(User user, String token);

	/**
	 * @param user
	 * @return session token
	 */
	String getSessionToken(User user);
	
	User getUserByToken(String token);

}
