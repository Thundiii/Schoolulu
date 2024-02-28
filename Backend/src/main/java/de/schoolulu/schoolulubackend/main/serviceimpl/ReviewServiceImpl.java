package de.schoolulu.schoolulubackend.main.serviceimpl;

import java.util.ArrayList;
import java.util.List;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Service;
import org.springframework.web.server.ResponseStatusException;

import de.schoolulu.schoolulubackend.main.assembler.ReviewContentDtoAssembler;
import de.schoolulu.schoolulubackend.main.disassembler.ReviewContentDtoDisassembler;
import de.schoolulu.schoolulubackend.main.dto.ReviewContentDto;
import de.schoolulu.schoolulubackend.main.entity.Review;
import de.schoolulu.schoolulubackend.main.entity.ReviewContent;
import de.schoolulu.schoolulubackend.main.entity.School;
import de.schoolulu.schoolulubackend.main.entity.User;
import de.schoolulu.schoolulubackend.main.repositorys.ReviewRepository;
import de.schoolulu.schoolulubackend.main.repositorys.SchoolRepository;
import de.schoolulu.schoolulubackend.main.repositorys.UserRepository;
import de.schoolulu.schoolulubackend.main.service.ReviewService;
import de.schoolulu.schoolulubackend.main.service.UserService;

/**
 * @author Noah
 *
 */
@Service
public class ReviewServiceImpl implements ReviewService {

	private final static Logger LOGGER = LoggerFactory.getLogger(ReviewServiceImpl.class);
	
	/** */
	@Autowired
	private ReviewRepository repo;

	/** */
	@Autowired
	private ReviewContentDtoDisassembler dtoDisassembler;

	/**
	 * 
	 */
	@Autowired
	private ReviewContentDtoAssembler dtoAssembler;

	@Autowired
	private UserRepository userRepo;

	@Autowired
	private SchoolRepository schoolRepo;
	
	@Autowired
	private UserService userService;

	@Override
	public void create(String token, long schoolid, ReviewContentDto dto) {

		Review review = new Review();
		
		User publisher = this.userService.getUserByToken(token);
		
		if(publisher == null) {
			
			throw new ResponseStatusException(HttpStatus.UNAUTHORIZED);
		}
		 
		review.setPublisher(publisher);
		review.setSchoolname(schoolRepo.findOne(schoolid));
		review.setReviewContent(dtoDisassembler.toReviewContent(dto));
		
		this.LOGGER.info("Review created by "+publisher.getName() +" for school with id "+schoolid);
		
		this.repo.save(review);
	}

	@Override
	public ReviewContentDto GetReviewById(Long reviewId) {

		Review review = this.repo.findOne(reviewId);

		if (review == null) {
			throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "Review with id " + reviewId + " not found");
		}

		ReviewContent reviewContent = review.getReviewContent();

		return this.dtoAssembler.toDto(reviewContent);
	}

	@Override
	public List<ReviewContentDto> GetAllReviewsFromUser(Long userId) {

		User user = this.userRepo.findOne(userId);

		List<Review> reviews = this.repo.getAllByPublisher(user);

		List<ReviewContentDto> reviewContentDtos = new ArrayList<>();

		for (Review eachReview : reviews) {
			ReviewContent content = eachReview.getReviewContent();
			content.setId(eachReview.getSchoolname().getId());
			reviewContentDtos.add(this.dtoAssembler.toDto(content));
		}

		return reviewContentDtos;
	}

	@Override
	public List<ReviewContentDto> GetAllReviewsFromSchool(Long schoolId) {

		School school = this.schoolRepo.findOne(schoolId);

		List<Review> reviews = this.repo.getAllBySchool(school);

		List<ReviewContentDto> reviewContentDtos = new ArrayList<>();

		for (Review eachReview : reviews) {
			reviewContentDtos.add(this.dtoAssembler.toDto(eachReview.getReviewContent()));
		}

		return reviewContentDtos;
	}

}
