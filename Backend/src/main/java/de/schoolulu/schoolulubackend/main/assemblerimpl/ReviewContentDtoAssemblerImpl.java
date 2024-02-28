package de.schoolulu.schoolulubackend.main.assemblerimpl;

import org.springframework.stereotype.Service;

import de.schoolulu.schoolulubackend.main.assembler.ReviewContentDtoAssembler;
import de.schoolulu.schoolulubackend.main.dto.ReviewContentDto;
import de.schoolulu.schoolulubackend.main.entity.ReviewContent;

/**
 * @author Noah
 *
 */
@Service
public class ReviewContentDtoAssemblerImpl implements ReviewContentDtoAssembler {

	/**
	 *
	 */
	@Override
	public ReviewContentDto toDto(ReviewContent reviewContent) {

		ReviewContentDto dto = new ReviewContentDto();

		dto.setId(reviewContent.getId());
		dto.setAccessibility(reviewContent.getAccessibility());
		dto.setAtmosphere(reviewContent.getAtmosphere());
		dto.setCanteen(reviewContent.getCanteen());
		dto.setCompetence(reviewContent.getCompetence());
		dto.setEquality(reviewContent.getEquality());
		dto.setInternet(reviewContent.getInternet());
		dto.setMateHandling(reviewContent.getMateHandling());
		dto.setParkingSpot(reviewContent.getParkingSpot());
		dto.setRoomEquipment(reviewContent.getRoomEquipment());
		dto.setToilets(reviewContent.getToilets());
		dto.setTransportConnections(reviewContent.getTransportConnections());

		return dto;
	}

}
