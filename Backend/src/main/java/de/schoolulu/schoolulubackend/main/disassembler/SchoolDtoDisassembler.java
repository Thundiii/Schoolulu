package de.schoolulu.schoolulubackend.main.disassembler;

import de.schoolulu.schoolulubackend.main.dto.SchoolDto;
import de.schoolulu.schoolulubackend.main.dto.UserDto;
import de.schoolulu.schoolulubackend.main.entity.School;
import de.schoolulu.schoolulubackend.main.entity.User;

/**
 * @author Noah
 *
 */
public interface SchoolDtoDisassembler {

	/**
	 * @param schoolDto
	 * @return School
	 */
	School toSchool(SchoolDto schoolDto);

}
