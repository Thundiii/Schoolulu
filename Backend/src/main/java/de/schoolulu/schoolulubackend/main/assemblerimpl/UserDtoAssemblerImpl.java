package de.schoolulu.schoolulubackend.main.assemblerimpl;

import org.springframework.stereotype.Service;

import de.schoolulu.schoolulubackend.main.assembler.UserDtoAssembler;
import de.schoolulu.schoolulubackend.main.dto.UserDto;
import de.schoolulu.schoolulubackend.main.entity.User;

/**
 * @author Silas
 *
 */
@Service
public class UserDtoAssemblerImpl implements UserDtoAssembler {

	/**
	 *
	 */
	@Override
	public UserDto toDto(User user) {

		UserDto dto = new UserDto();

		dto.setId(user.getId());
		dto.setName(user.getName());
		dto.setEmail(user.getEmail());

		return dto;
	}

}
