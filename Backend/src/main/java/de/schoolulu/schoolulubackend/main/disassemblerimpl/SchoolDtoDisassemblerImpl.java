package de.schoolulu.schoolulubackend.main.disassemblerimpl;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Service;
import org.springframework.web.server.ResponseStatusException;

import de.schoolulu.schoolulubackend.main.disassembler.SchoolDtoDisassembler;
import de.schoolulu.schoolulubackend.main.disassembler.UserDtoDisassembler;
import de.schoolulu.schoolulubackend.main.dto.SchoolDto;
import de.schoolulu.schoolulubackend.main.dto.UserDto;
import de.schoolulu.schoolulubackend.main.entity.School;
import de.schoolulu.schoolulubackend.main.entity.User;
import de.schoolulu.schoolulubackend.main.repositorys.SchoolRepository;
import de.schoolulu.schoolulubackend.main.repositorys.UserRepository;

/**
 * @author Noah
 *
 */
@Service
public class SchoolDtoDisassemblerImpl implements SchoolDtoDisassembler {

	/** */
	@Autowired
	private SchoolRepository repo;

	/**
	 *
	 */
	@Override
	public School toSchool(SchoolDto schoolDto)
	{
		
		if (schoolDto.getId() == null)
		{

			return new School(schoolDto.getSchoolname(), schoolDto.getCity(), schoolDto.getZipCode(),
					schoolDto.getStreet(), schoolDto.getHouseNumber(), schoolDto.getLogo(),
					schoolDto.getScore());

		}

		School school = this.repo.findOne(schoolDto.getId());

		if (school == null)
			throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "School with id " + schoolDto.getId() + " not found");

		return school;
	}

}
