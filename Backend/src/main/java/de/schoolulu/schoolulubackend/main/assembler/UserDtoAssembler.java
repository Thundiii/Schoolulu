package de.schoolulu.schoolulubackend.main.assembler;

import de.schoolulu.schoolulubackend.main.dto.UserDto;
import de.schoolulu.schoolulubackend.main.entity.User;

/**
 * @author Silas
 *
 */
public interface UserDtoAssembler {

	/**
	 * @param user
	 * @return user dto
	 */
	UserDto toDto(User user);

}
