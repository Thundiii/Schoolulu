package de.schoolulu.schoolulubackend.main.service;

import java.util.List;

import de.schoolulu.schoolulubackend.main.dto.SchoolDto;

/**
 * @author Noah
 *
 */
public interface SchoolService {

	void create(String schoolname, String city, String zipCode, String street, String houseNumber,
			String logo, int score);

	void delete(Long schoolid);

	void edit(Long schoolid, SchoolDto dto);
	
	SchoolDto getSchool(Long schoolid);
	
	List<SchoolDto> getAllSchools();

}
