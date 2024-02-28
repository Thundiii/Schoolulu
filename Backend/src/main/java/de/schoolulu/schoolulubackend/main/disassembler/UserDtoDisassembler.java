package de.schoolulu.schoolulubackend.main.disassembler;

import de.schoolulu.schoolulubackend.main.dto.UserDto;
import de.schoolulu.schoolulubackend.main.entity.User;

/**
 * @author Silas
 *
 */
public interface UserDtoDisassembler {

	/**
	 * @param userDto
	 * @return User
	 */
	User toUser(UserDto userDto);

}
