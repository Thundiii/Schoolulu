package de.schoolulu.schoolulubackend.main.assembler;

import de.schoolulu.schoolulubackend.main.dto.SchoolDto;
import de.schoolulu.schoolulubackend.main.entity.School;

/**
 * @author Noah
 *
 */
public interface SchoolDtoAssembler {

	/**
	 * @param school
	 * @return school dto
	 */
	SchoolDto toDto(School school);

}
