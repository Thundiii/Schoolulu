package de.schoolulu.schoolulubackend.main.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import de.schoolulu.schoolulubackend.main.dto.SchoolDto;
import de.schoolulu.schoolulubackend.main.service.SchoolService;

/**
 * @author Noah
 *
 */
@RestController
public class SchoolController {

	/** */
	@Autowired
	private SchoolService service;

	@PostMapping(value = "/api/school/get")
	public SchoolDto getSchool(@RequestParam long schoolid) {
		return this.service.getSchool(schoolid);
	}

	@PostMapping(value = "/api/school/create")
	public void onCreate(@RequestParam String schoolname, @RequestParam String city, @RequestParam String zipCode,
			@RequestParam String street, @RequestParam String houseNumber, String logo) {

		this.service.create(schoolname, city, zipCode, street, houseNumber, logo, 0);
	}

	@PostMapping(value = "/api/school/delete")
	public void onDelete(@RequestParam long schoolid) {

		this.service.delete(schoolid);

	}

	@GetMapping(value = "/api/school/all")
	public List<SchoolDto> onGetAll() {
		return this.service.getAllSchools();
	}

}
