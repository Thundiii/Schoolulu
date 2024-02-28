package de.schoolulu.schoolulubackend.main.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import de.schoolulu.schoolulubackend.main.dto.UserDto;
import de.schoolulu.schoolulubackend.main.service.UserService;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

/**
 * @author Silas
 *
 */
@RestController
public class UserController {

	/** */
	@Autowired
	private UserService service;

	/**
	 * @param username
	 * @param email
	 * @param password
	 */
	@PostMapping(value = "/api/user/create")
	public void onCreate(@RequestParam String username, @RequestParam String email, @RequestParam String password) {

		this.service.create(username, email, password);
	}

	/**
	 * @param userid
	 */
	@PostMapping(value = "/api/user/delete")
	public void onDelete(@RequestParam long userid) {

		this.service.delete(userid);

	}

	/**
	 * @param userid
	 * @param newData
	 */
	@PostMapping(value = "/api/user/edit")
	public void onEdit(@RequestParam long userid, @RequestParam UserDto newData) {

		this.service.edit(userid, newData);

	}

	/**
	 * @return all users
	 */
	@PostMapping(value = "/api/user/all")
	public List<UserDto> onRequestAll() {
		return this.service.getAllUsers();
	}

	/**
	 * @param username
	 * @param password
	 * @return
	 */
	@PostMapping(value = "/api/user/login")
	public UserDto onLogin(@RequestParam String username, @RequestParam String password, HttpServletResponse request) {
		return this.service.login(username, password, request);
	}

	/**
	 * @param request
	 * @param response
	 */
	@PostMapping(value = "/api/user/logout")
	public void onLogout(HttpServletRequest request, HttpServletResponse response) {
		this.service.logOut(request, response);
	}

}
