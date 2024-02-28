package de.schoolulu.schoolulubackend.main.assembler;

import de.schoolulu.schoolulubackend.main.dto.ReviewContentDto;
import de.schoolulu.schoolulubackend.main.entity.ReviewContent;

/**
 * @author Noah
 *
 */
public interface ReviewContentDtoAssembler {

	/**
	 * @param review
	 * @return reviewContent dto
	 */
	ReviewContentDto toDto(ReviewContent reviewContent);

}
