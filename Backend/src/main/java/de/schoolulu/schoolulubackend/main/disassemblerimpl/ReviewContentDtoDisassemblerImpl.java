package de.schoolulu.schoolulubackend.main.disassemblerimpl;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import de.schoolulu.schoolulubackend.main.disassembler.ReviewContentDtoDisassembler;
import de.schoolulu.schoolulubackend.main.dto.ReviewContentDto;
import de.schoolulu.schoolulubackend.main.entity.ReviewContent;
import de.schoolulu.schoolulubackend.main.repositorys.ReviewRepository;

/**
 * @author Noah
 *
 */
@Service
public class ReviewContentDtoDisassemblerImpl implements ReviewContentDtoDisassembler {

	/** */
	@Autowired
	private ReviewRepository repo;

	/**
	 *
	 */
	@Override
	public ReviewContent toReviewContent(ReviewContentDto reviewContentDto) {

		ReviewContent reviewContent = new ReviewContent();

		reviewContent.setAccessibility(reviewContentDto.getAccessibility());
		reviewContent.setAtmosphere(reviewContentDto.getAtmosphere());
		reviewContent.setCanteen(reviewContentDto.getCanteen());
		reviewContent.setCompetence(reviewContentDto.getCompetence());
		reviewContent.setEquality(reviewContentDto.getEquality());
		reviewContent.setInternet(reviewContentDto.getInternet());
		reviewContent.setMateHandling(reviewContentDto.getMateHandling());
		reviewContent.setParkingSpot(reviewContentDto.getParkingSpot());
		reviewContent.setRoomEquipment(reviewContentDto.getRoomEquipment());
		reviewContent.setToilets(reviewContentDto.getToilets());
		reviewContent.setTransportConnections(reviewContentDto.getTransportConnections());

		return reviewContent;
	}

}
