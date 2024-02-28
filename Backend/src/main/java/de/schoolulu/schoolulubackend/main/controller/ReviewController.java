package de.schoolulu.schoolulubackend.main.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RequestPart;
import org.springframework.web.bind.annotation.RestController;

import de.schoolulu.schoolulubackend.main.dto.ReviewContentDto;
import de.schoolulu.schoolulubackend.main.service.ReviewService;

/**
 * @author Noah
 *
 */
@RestController
public class ReviewController {

	@Autowired
	private ReviewService service;

	@PostMapping(value = "/api/review/create")
	public void onCreate(@RequestParam String token, @RequestParam long schoolId, @RequestPart ReviewContentDto dto) {
		this.service.create(token, schoolId, dto);
	}

	@GetMapping(value = "/api/review/get")
	public ReviewContentDto GetReviewById(@RequestParam Long reviewId) {
		return this.service.GetReviewById(reviewId);
	}

	@GetMapping(value = "/api/review/user")
	public List<ReviewContentDto> GetAllReviewsFromUser(@RequestParam Long userId) {
		return this.service.GetAllReviewsFromUser(userId);
	}

	@GetMapping(value = "/api/review/school")
	public List<ReviewContentDto> GetAllReviewsFromSchool(@RequestParam Long schoolId) {
		return this.service.GetAllReviewsFromSchool(schoolId);
	}
}
