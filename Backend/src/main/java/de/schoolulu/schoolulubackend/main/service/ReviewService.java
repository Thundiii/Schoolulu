package de.schoolulu.schoolulubackend.main.service;

import java.util.List;

import org.springframework.stereotype.Service;

import de.schoolulu.schoolulubackend.main.dto.ReviewContentDto;


/**
 * @author Noah
 *
 */
public interface ReviewService {
	
	void create(String token, long schoolid, ReviewContentDto dto);
	
	ReviewContentDto GetReviewById(Long reviewId);
	
	List<ReviewContentDto> GetAllReviewsFromUser(Long userId);
	
	List<ReviewContentDto> GetAllReviewsFromSchool(Long schoolId);
}
