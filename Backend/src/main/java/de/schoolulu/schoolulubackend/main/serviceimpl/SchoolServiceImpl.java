package de.schoolulu.schoolulubackend.main.serviceimpl;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Service;
import org.springframework.web.server.ResponseStatusException;

import de.schoolulu.schoolulubackend.main.assembler.SchoolDtoAssembler;
import de.schoolulu.schoolulubackend.main.disassembler.SchoolDtoDisassembler;
import de.schoolulu.schoolulubackend.main.dto.SchoolDto;
import de.schoolulu.schoolulubackend.main.entity.Review;
import de.schoolulu.schoolulubackend.main.entity.ReviewContent;
import de.schoolulu.schoolulubackend.main.entity.School;
import de.schoolulu.schoolulubackend.main.repositorys.ReviewRepository;
import de.schoolulu.schoolulubackend.main.repositorys.SchoolRepository;
import de.schoolulu.schoolulubackend.main.service.SchoolService;

/**
 * @author Noah
 *
 */
@Service
public class SchoolServiceImpl implements SchoolService {
	/** */
	@Autowired
	private SchoolRepository repo;

	/** */
	@Autowired
	private SchoolDtoDisassembler dtoDisassembler;

	/**
	 * 
	 */
	@Autowired
	private SchoolDtoAssembler dtoAssembler;
	
	
	@Autowired
	private ReviewRepository reviewRepo;
	
	/**
	 *
	 */
	@Override
	public void create(String schoolname, String city, String zipCode, String street, String houseNumber, String logo,
			int score) {
		if (this.repo.existsBySchoolname(schoolname)) {
			throw new ResponseStatusException(HttpStatus.CONFLICT,
					"School with schoolname " + schoolname + " already exists");
		}

		this.repo.save(new School(schoolname, city, zipCode, street, houseNumber, logo, score));

	}

	/**
	 *
	 */
	@Override
	public void edit(Long schoolid, SchoolDto dto) {
		School editData = this.dtoDisassembler.toSchool(dto);

		School schoolToUpdate = this.repo.findOne(dto.getId());

		if (schoolToUpdate == null) {

			throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "School with id " + schoolid + " not found");

		}

		if (!editData.getId().equals(schoolToUpdate.getId())) {
			throw new ResponseStatusException(HttpStatus.BAD_REQUEST,
					"Given school id with id " + schoolid + " is not the same as the dto");

		}

		if (!schoolToUpdate.getSchoolname().equals(editData.getSchoolname())) {
			schoolToUpdate.setSchoolname(editData.getSchoolname());
		}

		if (!schoolToUpdate.getCity().equals(editData.getCity())) {
			schoolToUpdate.setCity(editData.getCity());
		}

		if (!schoolToUpdate.getZipCode().equals(editData.getZipCode())) {
			schoolToUpdate.setZipCode(editData.getZipCode());
		}

		if (!schoolToUpdate.getStreet().equals(editData.getStreet())) {
			schoolToUpdate.setStreet(editData.getStreet());
		}

		if (!schoolToUpdate.getHouseNumber().equals(editData.getHouseNumber())) {
			schoolToUpdate.setHouseNumber(editData.getHouseNumber());
		}

		if (!schoolToUpdate.getLogo().equals(editData.getLogo())) {
			schoolToUpdate.setLogo(editData.getLogo());
		}

	}

	@Override
	public SchoolDto getSchool(Long schoolid) {

		School school = this.repo.findOne(schoolid);
		SchoolDto schoolDto = new SchoolDto();

		if (school == null) {
			throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "School with id " + schoolid + " not found");
		} else {
			schoolDto.setId(school.getId());
			schoolDto.setSchoolname(school.getSchoolname());
			schoolDto.setCity(school.getCity());
			schoolDto.setZipCode(school.getZipCode());
			schoolDto.setStreet(school.getStreet());
			schoolDto.setHouseNumber(school.getHouseNumber());
			schoolDto.setLogo(school.getLogo());
			schoolDto.setScore(school.getScore());
		}

		return schoolDto;
	}

	@Override
	public void delete(Long schoolid) {
		School school = this.repo.findOne(schoolid);

		if (school == null)
			throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "School with id " + schoolid + " not found");

		this.repo.delete(schoolid);

	}

	@Override
	public List<SchoolDto> getAllSchools() {
		List<School> school = this.repo.findAll();

		List<SchoolDto> schoolDtos = new ArrayList<>();

		for (School eachSchool : school) {
			
			float score = 0;
			float index = 0;
			SchoolDto dto = this.dtoAssembler.toDto(eachSchool);
			
			List<Review> allReviews = this.reviewRepo.getAllBySchool(eachSchool);
			
			for(Review review : allReviews) {
				ReviewContent content = review.getReviewContent();
				score += content.getAccessibility();
				score += content.getAtmosphere();
				score += content.getCanteen();
				score += content.getCompetence();
				score += content.getEquality();
				score += content.getInternet();
				score += content.getMateHandling();
				score += content.getParkingSpot();
				score += content.getRoomEquipment();
				score += content.getToilets();
				score += content.getTransportConnections();
				index += 11;
				
			}
			
			if(score == 0) {
				score = 0;
			} else {
				
				float scoreToRound = score / index;
				float roundedScore = (float) (Math.round(scoreToRound * 10) / 10.0);
				
				dto.setScore(roundedScore);
			}
			
			schoolDtos.add(dto);
		}

		return schoolDtos;
	}

}
