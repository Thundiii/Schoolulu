package de.schoolulu.schoolulubackend.main.assemblerimpl;

import org.springframework.stereotype.Service;

import de.schoolulu.schoolulubackend.main.assembler.SchoolDtoAssembler;
import de.schoolulu.schoolulubackend.main.dto.SchoolDto;
import de.schoolulu.schoolulubackend.main.entity.School;

/**
 * @author Noah
 *
 */
@Service
public class SchoolDtoAssemblerImpl implements SchoolDtoAssembler {

	/**
	 *
	 */
	@Override
	public SchoolDto toDto(School school) {

		SchoolDto dto = new SchoolDto();
		
		dto.setId(school.getId());
		dto.setSchoolname(school.getSchoolname());
		dto.setCity(school.getCity());
		dto.setZipCode(school.getZipCode());
		dto.setStreet(school.getStreet());
		dto.setHouseNumber(school.getHouseNumber());
		dto.setLogo(school.getLogo());
		dto.setScore(school.getScore());
		
		return dto;
	}

}
