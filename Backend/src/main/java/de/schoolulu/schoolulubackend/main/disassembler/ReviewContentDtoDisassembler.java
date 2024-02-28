package de.schoolulu.schoolulubackend.main.disassembler;

import de.schoolulu.schoolulubackend.main.dto.ReviewContentDto;
import de.schoolulu.schoolulubackend.main.entity.ReviewContent;

/**
 * @author Noah
 *
 */
public interface ReviewContentDtoDisassembler {

	/**
	 * @param reviewContentDto
	 * @return ReviewContent
	 */
	ReviewContent toReviewContent(ReviewContentDto reviewContentDto);

}
