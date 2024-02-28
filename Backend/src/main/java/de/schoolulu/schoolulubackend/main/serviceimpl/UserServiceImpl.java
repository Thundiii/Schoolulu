package de.schoolulu.schoolulubackend.main.serviceimpl;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Random;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Service;
import org.springframework.web.server.ResponseStatusException;

import de.schoolulu.schoolulubackend.main.assembler.UserDtoAssembler;
import de.schoolulu.schoolulubackend.main.disassembler.UserDtoDisassembler;
import de.schoolulu.schoolulubackend.main.dto.UserDto;
import de.schoolulu.schoolulubackend.main.entity.User;
import de.schoolulu.schoolulubackend.main.repositorys.UserRepository;
import de.schoolulu.schoolulubackend.main.service.UserService;
import jakarta.servlet.http.Cookie;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;

/**
 * @author Silas
 *
 */
@Service
public class UserServiceImpl implements UserService {

	/**
	 * 
	 */
	private final static Logger LOGGER = LoggerFactory.getLogger(UserServiceImpl.class);

	/** */
	@Autowired
	private UserRepository repo;

	/** */
	@Autowired
	private UserDtoDisassembler dtoDisassembler;

	/**
	 * 
	 */
	@Autowired
	private UserDtoAssembler dtoAssembler;

	/**
	 * 
	 */
	private HashMap<User, String> sessionTokens = new HashMap<>();

	/**
	 *
	 */
	@Override
	public void create(String username, String email, String password) {

		if (username.isEmpty() || email.isEmpty() || password.isEmpty()) {
			throw new ResponseStatusException(HttpStatus.METHOD_NOT_ALLOWED, "One or more fields are missing");
		}

		if (this.repo.existsByName(username)) {
			throw new ResponseStatusException(HttpStatus.CONFLICT,
					"User with username " + username + " already exists");
		}

		if (username.contains(" ")) {
			throw new ResponseStatusException(HttpStatus.FORBIDDEN, "Invalid username");
		}

		if (this.repo.existsByEmail(email)) {
			throw new ResponseStatusException(HttpStatus.CONFLICT, "User with email " + email + " already exists");
		}

		this.repo.save(new User(username, email, password));
	}

	/**
	 *
	 */
	@Override
	public void delete(Long userid) {

		User user = this.repo.findOne(userid);

		if (user == null)
			throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "User with id " + userid + " not found");

		this.repo.delete(userid);

	}

	/**
	 *
	 */
	@Override
	public void edit(Long userid, UserDto dto) {

		User editData = this.dtoDisassembler.toUser(dto);

		User userToUpdate = this.repo.findOne(dto.getId());

		if (userToUpdate == null) {

			throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "User with id " + userid + " not found");

		}

		if (!editData.getId().equals(userToUpdate.getId())) {
			throw new ResponseStatusException(HttpStatus.BAD_REQUEST,
					"Given user id with id " + userid + " is not the same as the dto");

		}

		if (!userToUpdate.getName().equals(editData.getName())) {
			userToUpdate.setName(editData.getName());
		}

		if (!userToUpdate.getEmail().equals(editData.getEmail())) {
			userToUpdate.setEmail(editData.getEmail());
		}

		if (!userToUpdate.getPassword().equals(editData.getPassword())) {
			userToUpdate.setPassword(editData.getPassword());
		}

	}

	/**
	 *
	 */
	@Override
	public List<UserDto> getAllUsers() {

		List<User> user = this.repo.findAll();

		List<UserDto> userDtos = new ArrayList<>();

		for (User u : user) {
			userDtos.add(this.dtoAssembler.toDto(u));
		}

		return userDtos;
	}

	/**
	 *
	 */
	@Override
	public UserDto login(String username, String hashedPassword, HttpServletResponse response) {

		User user = this.repo.findByName(username);

		if (user == null) {
			throw new ResponseStatusException(HttpStatus.UNAUTHORIZED, "Username / Password wrong");

		}

		if (!user.getPassword().equals(hashedPassword)) {

			throw new ResponseStatusException(HttpStatus.UNAUTHORIZED, "Username / Password wrong");

		}

		String tokenToGive;
		do {

			tokenToGive = this.generateSessionToken();

		} while (this.sessionTokens.containsValue(tokenToGive));

		Cookie cookie = new Cookie("s_token", tokenToGive);

		cookie.setPath("/");

		response.addCookie(cookie);

		this.addSessionToken(user, tokenToGive);

		LOGGER.info("User " + user.getName() + " logged in with token " + tokenToGive);

		return this.dtoAssembler.toDto(user);

	}

	/**
	 *
	 */
	@Override
	public void addSessionToken(User user, String token) {
		this.sessionTokens.put(user, token);

	}

	/**
	 *
	 */
	@Override
	public String getSessionToken(User user) {
		return this.sessionTokens.get(user);
	}

	/**
	 * @param token
	 * @return token
	 */
	public User getUserByToken(String token) {

		for (User user : this.sessionTokens.keySet()) {

			if (this.sessionTokens.get(user).equals(token)) {
				return user;
			}

		}

		return null;

	}

	/**
	 * @return generated token
	 */
	public String generateSessionToken() {

		String values = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";

		String token = "";
		Random r = new Random();
		for (int i = 0; i < 20; i++) {

			token += values.charAt(r.nextInt(values.length()));

		}

		return token;

	}

	/**
	 *
	 */
	@Override
	public void logOut(HttpServletRequest request, HttpServletResponse response) {

		boolean validSession = false;

		Cookie[] cookies = request.getCookies();
		if (cookies == null) {
			throw new ResponseStatusException(HttpStatus.UNAUTHORIZED, "No session cookie found");
		}

		for (Cookie cookie : cookies) {
			if (cookie.getName().equals("s_token")) {

				if (this.sessionTokens.containsValue(cookie.getValue())) {

					validSession = true;

				} else {
					throw new ResponseStatusException(HttpStatus.UNAUTHORIZED, "Invalid cookie");

				}

			}

		}

		if (!validSession) {
			throw new ResponseStatusException(HttpStatus.UNAUTHORIZED, "No valid session found");
		}

		HttpSession session = request.getSession(false);
		if (session != null) {
			session.invalidate();
		}

		for (Cookie cookie : request.getCookies()) {
			cookie.setValue(null);
			cookie.setPath("/");
			cookie.setMaxAge(0);
			response.addCookie(cookie);
		}

		return;

	}

}
