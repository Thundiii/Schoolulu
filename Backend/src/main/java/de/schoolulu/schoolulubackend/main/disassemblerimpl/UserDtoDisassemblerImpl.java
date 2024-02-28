package de.schoolulu.schoolulubackend.main.disassemblerimpl;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Service;
import org.springframework.web.server.ResponseStatusException;

import de.schoolulu.schoolulubackend.main.disassembler.UserDtoDisassembler;
import de.schoolulu.schoolulubackend.main.dto.UserDto;
import de.schoolulu.schoolulubackend.main.entity.User;
import de.schoolulu.schoolulubackend.main.repositorys.UserRepository;

/**
 * @author Silas
 *
 */
@Service
public class UserDtoDisassemblerImpl implements UserDtoDisassembler {

	/** */
	@Autowired
	private UserRepository repo;

	/**
	 *
	 */
	@Override
	public User toUser(UserDto userDto) {

		if (userDto.getId() == null) {

			throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "User with id " + userDto.getId() + " not found");

		}

		User user = this.repo.findOne(userDto.getId());

		if (user == null)
			throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "User with id " + userDto.getId() + " not found");

		return user;
	}

}
